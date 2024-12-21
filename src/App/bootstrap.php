<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Config\Paths;
use Dotenv\Dotenv;

use function App\Config\{registerRoutes, registerMiddleware};

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$app = new App(Paths::SOURCE . "App/container-definitions.php");
//cada vez que agreguemos una nueva configuracion debemos de ejecuta el composer-autoload
//para generar los nuevos archivos
registerRoutes($app);
registerMiddleware($app);

return $app;
