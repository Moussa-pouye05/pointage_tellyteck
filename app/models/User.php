<?php

namespace App\Models;

use PDO;

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
