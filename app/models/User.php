<?php

namespace App\Models;

use PDO;
use Throwable;

class User extends Model
{
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => strtolower(trim($email))]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function searchStudents(array $filters = [], int $page = 1, int $perPage = 8): array
    {
        $where = ["u.role = 'etudiant'"];
        $params = [];

        $search = trim($filters['search'] ?? '');
        if ($search !== '') {
            $where[] = '(u.nom LIKE :search OR u.email LIKE :search OR u.telephone LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }

        $status = $filters['status'] ?? 'all';
        if ($status === 'active') {
            $where[] = 'u.is_active = 1';
        } elseif ($status === 'inactive') {
            $where[] = 'u.is_active = 0';
        }

        $cohortId = (int)($filters['cohort_id'] ?? 0);
        if ($cohortId > 0) {
            $where[] = 'u.cohort_id = :cohort_id';
            $params['cohort_id'] = $cohortId;
        }

        $departmentId = (int)($filters['department_id'] ?? 0);
        if ($departmentId > 0) {
            $where[] = 'c.department_id = :department_id';
            $params['department_id'] = $departmentId;
        }

        $whereSql = implode(' AND ', $where);
        $countStmt = $this->db->prepare(
            "SELECT COUNT(*)
             FROM users u
             LEFT JOIN cohorts c ON c.id = u.cohort_id
             WHERE {$whereSql}"
        );
        $countStmt->execute($params);
        $total = (int)$countStmt->fetchColumn();

        $page = max(1, $page);
        $perPage = max(1, $perPage);
        $totalPages = max(1, (int)ceil($total / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;

        $stmt = $this->db->prepare(
            "SELECT u.*, c.name AS cohort_name, d.name AS department_name, q.token AS qr_token
             FROM users u
             LEFT JOIN cohorts c ON c.id = u.cohort_id
             LEFT JOIN departments d ON d.id = c.department_id
             LEFT JOIN qr_code q ON q.user_id = u.id
             WHERE {$whereSql}
             ORDER BY u.id DESC
             LIMIT :limit OFFSET :offset"
        );

        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return [
            'items' => $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [],
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => $totalPages,
            'from' => $total === 0 ? 0 : $offset + 1,
            'to' => min($offset + $perPage, $total),
        ];
    }

    public function studentStats(array $filters = []): array
    {
        $result = $this->searchStudents($filters, 1, 1);
        $activeFilters = $filters;
        $inactiveFilters = $filters;
        $activeFilters['status'] = 'active';
        $inactiveFilters['status'] = 'inactive';

        return [
            'total' => $result['total'],
            'active' => $this->searchStudents($activeFilters, 1, 1)['total'],
            'inactive' => $this->searchStudents($inactiveFilters, 1, 1)['total'],
            'new_this_month' => 0,
        ];
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (profil, nom, email, password_hash, role, department, telephone, is_active)
             VALUES (:profil, :nom, :email, :password_hash, :role, :department, :telephone, :is_active)'
        );

        return $stmt->execute([
            'profil' => $data['profil'] ?? null,
            'nom' => trim($data['nom']),
            'email' => strtolower(trim($data['email'])),
            'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT),
            'role' => $data['role'],
            'department' => trim($data['department'] ?? ''),
            'telephone' => trim($data['telephone'] ?? ''),
            'is_active' => (int)($data['is_active'] ?? 0),
        ]);
    }

    public function createStudentWithQrToken(array $data, string $qrToken): int
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare(
                'INSERT INTO users (profil, nom, email, password_hash, role, telephone, is_active, cohort_id)
                 VALUES (:profil, :nom, :email, :password_hash, :role, :telephone, :is_active, :cohort_id)'
            );

            $stmt->execute([
                'profil' => $data['profil'] ?? null,
                'nom' => trim($data['nom']),
                'email' => strtolower(trim($data['email'])),
                'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT),
                'role' => $data['role'] ?? 'etudiant',
                'telephone' => trim($data['telephone'] ?? ''),
                'is_active' => (int)($data['is_active'] ?? 0),
                'cohort_id' => (int)$data['cohort_id'],
            ]);

            $userId = (int)$this->db->lastInsertId();

            $qrStmt = $this->db->prepare(
                'INSERT INTO qr_code (user_id, token, created_at, updated_at)
                 VALUES (:user_id, :token, :created_at, :updated_at)'
            );
            $now = date('Y-m-d H:i:s');
            $qrStmt->execute([
                'user_id' => $userId,
                'token' => $qrToken,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $this->db->commit();

            return $userId;
        } catch (Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }
    }

    public function logEmail(string $recipient, string $subject, string $status, ?string $errorMessage = null): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO email_logs (recipient, subject, status, error_message, created_at)
             VALUES (:recipient, :subject, :status, :error_message, :created_at)'
        );

        return $stmt->execute([
            'recipient' => strtolower(trim($recipient)),
            'subject' => $subject,
            'status' => $status,
            'error_message' => $errorMessage,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function updateProfile(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE users
             SET nom = :nom, department = :department, telephone = :telephone, profil = COALESCE(:profil, profil)
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'nom' => trim($data['nom']),
            'department' => trim($data['department'] ?? ''),
            'telephone' => trim($data['telephone'] ?? ''),
            'profil' => $data['profil'] ?? null,
        ]);
    }

    public function updateStudent(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE users
             SET nom = :nom, email = :email, telephone = :telephone, cohort_id = :cohort_id
             WHERE id = :id AND role = :role'
        );

        return $stmt->execute([
            'id' => $id,
            'nom' => trim($data['nom']),
            'email' => strtolower(trim($data['email'])),
            'telephone' => trim($data['telephone'] ?? ''),
            'cohort_id' => (int)$data['cohort_id'],
            'role' => 'etudiant',
        ]);
    }

    public function setActive(int $id, int $isActive): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE users SET is_active = :is_active WHERE id = :id AND role = :role'
        );

        return $stmt->execute([
            'id' => $id,
            'is_active' => $isActive,
            'role' => 'etudiant',
        ]);
    }

    public function updatePassword(int $id, string $password): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE users
             SET password_hash = :password_hash, reset_token_hash = NULL, reset_expires_at = NULL
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'password_hash' => password_hash($password, PASSWORD_BCRYPT),
        ]);
    }

    public function storeResetToken(int $id, string $token, string $expiresAt): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE users
             SET reset_token_hash = :reset_token_hash, reset_expires_at = :reset_expires_at
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'reset_token_hash' => hash('sha256', $token),
            'reset_expires_at' => $expiresAt,
        ]);
    }

    public function deleteStudent(int $id): bool
    {
        try {
            if ($this->db->inTransaction() === false) {
                $this->db->beginTransaction();
            }

            $qrStmt = $this->db->prepare('DELETE FROM qr_code WHERE user_id = :id');
            $qrStmt->execute(['id' => $id]);

            $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id AND role = :role');
            $deleted = $stmt->execute(['id' => $id, 'role' => 'etudiant']);

            if ($this->db->inTransaction()) {
                $this->db->commit();
            }

            return $deleted;
        } catch (Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }
    }

    public function findByValidResetToken(string $token): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM users
             WHERE reset_token_hash = :reset_token_hash
             AND reset_expires_at >= NOW()
             LIMIT 1'
        );
        $stmt->execute(['reset_token_hash' => hash('sha256', $token)]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function activate(int $id): bool
    {
        $stmt = $this->db->prepare('UPDATE users SET is_active = 1 WHERE id = :id');

        return $stmt->execute(['id' => $id]);
    }
}
