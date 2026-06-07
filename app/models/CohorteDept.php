<?php

namespace App\Models;

use PDO;

class CohorteDept extends Model
{
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO departments (name, code, description, is_active, created_at)
             VALUES (:name, :code, :description, :is_active, :created_at)'
        );

        return $stmt->execute([
            'name' => trim($data['name']),
            'code' => trim($data['code']),
            'description' => trim($data['description'] ?? ''),
            'is_active' => (int)($data['is_active'] ?? 0),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function allActive(): array
    {
        $stmt = $this->db->prepare('SELECT * FROM departments WHERE is_active = 1 ORDER BY name ASC');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function findByCode(string $code): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM departments WHERE code = :code LIMIT 1');
        $stmt->execute(['code' => trim($code)]);

        $departement = $stmt->fetch(PDO::FETCH_ASSOC);
        return $departement ?: null;
    }
}
