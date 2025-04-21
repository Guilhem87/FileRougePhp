<?php
// Détecte si on est sur Render ou un autre environnement de production
if (getenv('RENDER') === 'true' || getenv('PRODUCTION') === 'true') {
    // Utilise les variables d'environnement système
    $_ENV['DB_HOST'] = getenv('DB_HOST');
    $_ENV['DB_NAME'] = getenv('DB_NAME');
    $_ENV['DB_USER'] = getenv('DB_USER');
    $_ENV['DB_PASSWORD'] = getenv('DB_PASSWORD');
} else {
    // Charge depuis le fichier .env si disponible (pour le dev local)
    if (file_exists(__DIR__ . '/.env')) {
        $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $_ENV[trim($key)] = trim($value);
            }
        }
    }
}
?>