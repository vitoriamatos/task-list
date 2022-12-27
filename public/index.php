<?php

use app\controllers\AboutController;
use app\controllers\SiteController;
use app\controllers\TaskController;
use thecodeholic\phpmvc\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->get('/login/{id}', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/workspace', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [AboutController::class, 'index']);
$app->router->get('/profile', [SiteController::class, 'profile']);
$app->router->get('/profile/{id:\d+}/{username}', [SiteController::class, 'login']);

//todo routes
$app->router->get('/my-day', [TaskController::class, 'myDay']);
$app->router->get('/save-task', [TaskController::class, 'registerMainTask']);
$app->router->get('/save-subtask', [TaskController::class, 'registerSubTask']);
$app->router->get('/edit-task', [TaskController::class, 'edit']);
$app->router->get('/edit-day', [TaskController::class, 'edit_day']);
$app->router->get('/edit-time', [TaskController::class, 'edit_time']);
$app->router->get('/delete-task', [TaskController::class, 'delete']);
$app->router->get('/delete-task-main', [TaskController::class, 'delete_task_main']);
$app->router->get('/update-status', [TaskController::class, 'update_status']);
$app->run();
