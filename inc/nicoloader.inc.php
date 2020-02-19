<?php
declare(strict_types=1);

spl_autoload_register(static function(string $className) {
    include __DIR__ . '/../class/' . $className . '.class.php';
});