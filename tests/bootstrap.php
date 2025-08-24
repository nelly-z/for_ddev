<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

if (method_exists(Dotenv::class, 'bootEnv')) {
    // Load .env.test if it exists, otherwise fallback to .env
    $envFile = dirname(__DIR__).'/.env.test';
    if (!file_exists($envFile)) {
        $envFile = dirname(__DIR__).'/.env';
    }
    (new Dotenv())->bootEnv($envFile);
}
