<?php
// On charge l'environnement complet de CodeIgniter
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';

// On affiche les constantes et la config DB réelle
echo "1. WRITEPATH vaut : " . WRITEPATH . "\n";

$config = new \Config\Database();
echo "2. Chemin DB configuré : " . $config->default['database'] . "\n";

$dbPath = $config->default['database'];
echo "3. Le fichier existe-t-il ? " . (file_exists($dbPath) ? 'OUI' : 'NON') . "\n";
echo "4. Le fichier est-il inscriptible ? " . (is_writable($dbPath) ? 'OUI' : 'NON') . "\n";