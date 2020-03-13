<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\updateAction;


use App\Application\Actions\jobdating\ListjobAction;
use App\Application\Actions\jobdating\ViewjobAction;
use App\Application\Actions\jobdating\updatejobAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });
    
    $app->group('/jobdating', function (Group $group) {
        $group->get('',  ListjobAction::class);
        $group->post('', function(){});
        $group->get('/{id}', ViewjobAction::class);
        $group->put('/{id}',  updatejobAction::class);
        $group->delete('/{id}', function(){});

        $group->post('/{id}/{listName}', function(){});
        $group->get('/{id}/{listName}/{listId}', function(){});
        $group->put('/{id}/{listName}/{listId}', function(){});
        $group->delete('/{id}/{listName}/{listId}', function(){});



    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', updateAction::class);

    });

};
