<?php
/**
 * Define application routes in this file.
 *
 * @var Slim\App $app
 */

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response) {
    return $this->view->render($response, 'calculator.php', [
        'operators' => $this->get('settings')['view_operators']
    ]);
});

$app->post('/add', 'AddAction');
$app->post('/subtract', 'SubtractAction');
$app->post('/divide', 'DivideAction');
$app->post('/multiply', 'MultiplyAction');
