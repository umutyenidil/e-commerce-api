<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group("/api", static function (RouteCollection $routes) {
    $routes->group("v1", static function (RouteCollection $routes) {
        $routes->group("products", static function (RouteCollection $routes) {
            $routes->get("", "ProductController::readProducts");
            $routes->post("", "ProductController::createProduct");
            $routes->get(":id", "ProductController::readProduct");
            $routes->put(":id", "ProductController::updateProduct");
            $routes->delete(":id", "ProductController::deleteProduct");
        });
    });
});
