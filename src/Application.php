<?php
declare(strict_types=1);

namespace App;

use Cake\Routing\RouteBuilder;
use Cupcake\Application as CupcakeApplication;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends CupcakeApplication
{
    public function bootstrap(): void
    {
        parent::bootstrap();
        //$this->addPlugin('Cupcake');
    }

    /**
     * @inheritDoc
     */
    public function routes(RouteBuilder $routes): void
    {
        parent::routes($routes);
        $routes->scope('/', function (RouteBuilder $routes) {
            $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        });
    }
}
