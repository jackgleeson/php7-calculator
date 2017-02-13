<?php
/**
 * Define all application dependencies in this file.
 */
use App\Actions\{
    AddAction, SubtractAction, DivideAction, MultiplyAction
};
use App\Components\Calculator;
use Slim\Container;

/**
 * @var Container $container
 */
$container = $app->getContainer();

/**
 * @param Container $c
 * @return \Slim\Views\PhpRenderer
 */
$container['view'] = function (Container $c) {
    return new \Slim\Views\PhpRenderer('../src/Views/');
};

/**
 * @param Container $c
 * @return Calculator
 */
$container['calculator'] = function (Container $c) {
    return new Calculator();
};

/**
 * @param Container $c
 * @return AddAction
 */
$container['AddAction'] = function (Container $c) {
    return new AddAction($c->get('calculator'));
};

/**
 * @param Container $c
 * @return SubtractAction
 */
$container['SubtractAction'] = function (Container $c) {
    return new SubtractAction($c->get('calculator'));
};

/**
 * @param Container $c
 * @return DivideAction
 */
$container['DivideAction'] = function (Container $c) {
    return new DivideAction($c->get('calculator'));
};

/**
 * @param Container $c
 * @return MultiplyAction
 */
$container['MultiplyAction'] = function (Container $c) {
    return new MultiplyAction($c->get('calculator'));
};
