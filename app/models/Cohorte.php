<?php

namespace App\Models;

use PDO;

class Cohorte extends Model
{
    public function findAll(): array
    {
        $stmt = $this->db->prepare(
            'SELECT c.*, d.name as department_name
             FROM cohorts c
             LEFT JOIN departments d ON c.department_id = d.id
             ORDER BY c.created_at DESC'
        );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT c.*, d.name as department_name
             FROM cohorts c
             LEFT JOIN departments d ON c.department_id = d.id
             WHERE c.id = :id LIMIT 1'
        );
        $stmt->execute(['id' => $id]);

        $cohorte = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cohorte ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO cohorts (department_id, name, work_days, start_time, end_time, is_active, created_at)
             VALUES (:department_id, :name, :work_days, :start_time, :end_time, :is_active, :created_at)'
        );

        return $stmt->execute([
            'department_id' => (int)$data['department_id'],
            'name' => trim($data['name']),
            'work_days' => trim($data['work_days']),
            'start_time' => trim($data['start_time']),
            'end_time' => trim($data['end_time']),
            'is_active' => (int)($data['is_active'] ?? 1),
            'created_at' => $data['created_at'] ?? date('Y-m-d H:i:s'),
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE cohorts
             SET department_id = :department_id, name = :name, work_days = :work_days,
                 start_time = :start_time, end_time = :end_time, is_active = :is_active
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'department_id' => (int)$data['department_id'],
            'name' => trim($data['name']),
            'work_days' => trim($data['work_days']),
            'start_time' => trim($data['start_time']),
            'end_time' => trim($data['end_time']),
            'is_active' => (int)($data['is_active'] ?? 1),
        ]);
    }

    public function toggleActive(int $id, int $isActive): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE cohorts
             SET is_active = :is_active
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'is_active' => $isActive,
        ]);
    }

    public function findByDepartment(int $departmentId): array
    {
        $stmt = $this->db->prepare(
            'SELECT c.*, d.name as department_name
             FROM cohorts c
             LEFT JOIN departments d ON c.department_id = d.id
             WHERE c.department_id = :department_id
             ORDER BY c.created_at DESC'
        );
        $stmt->execute(['department_id' => $departmentId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function findActive(): array
    {
        $stmt = $this->db->prepare(
            'SELECT c.*, d.name as department_name
             FROM cohorts c
             LEFT JOIN departments d ON c.department_id = d.id
             WHERE c.is_active = 1
             ORDER BY c.name ASC'
        );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
}
