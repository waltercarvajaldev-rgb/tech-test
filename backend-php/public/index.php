<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$request = Request::capture();

// Forzar JSON para rutas /api/*
if (str_starts_with($request->getPathInfo(), '/api')) {
    header('Content-Type: application/json');
}

$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);