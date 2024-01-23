<?php
session_start();


use App\Controllers\BaseController;
use App\Controllers\HomeController;
use App\Controllers\ImageController;
use App\Controllers\ProjectController;
use App\Controllers\UserController;
use App\Utils\View;

require '../vendor/autoload.php';

$router = new AltoRouter();

$router->map( 'GET', '/', [HomeController::class, 'index'], 'home');
$router->map( 'GET', '/users', [UserController::class, 'index'], 'user.index');
$router->map( 'GET', '/users/[i:id]/edit', [UserController::class, 'edit'], 'user.edit');

$router->map( 'GET', '/cv', [BaseController::class, 'cv'], 'cv');

$router->map( 'GET', '/project/create', [ProjectController::class, 'create'], 'project.create');
$router->map( 'POST', '/project/store', [ProjectController::class, 'store'], 'project.store');
$router->map( 'GET', '/project/index', [ProjectController::class, 'index'], 'project.index');
$router->map( 'GET', '/project/[i:id]/edit', [ProjectController::class, 'edit'], 'project.edit');
$router->map( 'POST', '/project/[i:id]/update', [ProjectController::class, 'update'], 'project.update');
$router->map( 'GET', '/project/[i:id]/deleteProject', [ProjectController::class, 'deleteProject'], 'project.delete' );

$router->map( 'GET', '/image/[i:id]/delete', [ImageController::class, 'delete'], 'image.delete');


$match = $router->match();

if($match) {
    $target = $match['target'];
    $controller = $target[0];
    $methode = $target[1];
    $controller = new $controller();
    $params = $match['params'];

    call_user_func_array([$controller, $methode], $params);
}else {
    View::render('error');
}
