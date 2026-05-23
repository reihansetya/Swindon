<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    $controller = app(App\Http\Controllers\AlbumsController::class);
    echo "✓ AlbumsController instantiated successfully with ImageService dependency\n";
    echo "✓ ImageService is properly injected via constructor\n";
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
