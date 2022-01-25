<?php

use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Illuminate\Database\Capsule\Manager;
use Slim\Middleware\MethodOverrideMiddleware;

require __DIR__ . '/../vendor/autoload.php';
$settings = require __DIR__ . '/../config/settings.php';

// Create Container using PHP-DI
$container = new Container();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

$app = AppFactory::create();

if($settings['slim']['basePath'])
    $app->setBasePath($settings['slim']['basePath']);

// Create Twig
$twig = Twig::create($settings['twig']['twigViewPath'], $settings['twig']['twigOptions']);
// Accept All HTTP Methods in Forms
$methodOverridingMiddleware = new MethodOverrideMiddleware();

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));
// Add All HTTP Methods in Forms
$app->add($methodOverridingMiddleware);

// Add Eloquent ORM
$capsule = new Manager;
$capsule->addConnection($settings['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

require '../routes/web.php';
require "../routes/404.php";

$app->run();
