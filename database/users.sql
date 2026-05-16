CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    profil VARCHAR(255) NULL,
    nom VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'etudiant') NOT NULL DEFAULT 'etudiant',
    department VARCHAR(120) NULL,
    telephone VARCHAR(40) NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 0,
    reset_token_hash CHAR(64) NULL,
    reset_expires_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_users_role (role),
    INDEX idx_users_reset_token (reset_token_hash)
);

-- Exemple de compte admin actif pour demarrer.
-- Email: admin@example.com
-- Mot de passe: Admin@12345
INSERT INTO users (nom, email, password_hash, role, department, telephone, is_active)
SELECT 'Administrateur', 'admin@example.com', '$2y$10$2665/lT/bWuW5eUbimbc2uPZl1ABxWqBVwF4zfw2dECWgl3Y3DpSS', 'admin', 'Administration', '', 1
WHERE NOT EXISTS (SELECT 1 FROM users WHERE email = 'admin@example.com');
