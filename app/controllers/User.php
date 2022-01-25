<?php

namespace app\controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\models\User as UserModel;


class User extends UserModel
{    
    protected $user;

    public function index(Request $request, Response  $response, array $args) 
    {
        $users = User::All();
        $view = Twig::fromRequest($request);
        return $view->render($response, 'site/home.html', [ 'users' => $users ]);
    }
}