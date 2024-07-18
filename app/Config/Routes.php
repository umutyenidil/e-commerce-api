<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group("api", ["namespace" => "App\Controllers\Api"], function (RouteCollection $routes) {
    $routes->group("v1", ["namespace" => "App\Controllers\Api\V1"], function (RouteCollection $routes) {
        $routes->group("admin", ["namespace" => "App\Controllers\Api\V1\Admin"], function (RouteCollection $routes) {
            $routes->group("auth", function (RouteCollection $routes) {
                $routes->post("sign-in", "AuthController::signIn");
            });

            $routes->group("products", function (RouteCollection $routes) {
                $routes->get("", "ProductController::readProducts");
                $routes->post("", "ProductController::createProduct");
                $routes->get(":id", "ProductController::readProduct");
                $routes->put(":id", "ProductController::updateProduct");
                $routes->delete(":id", "ProductController::deleteProduct");
            });
        });
        $routes->group("user", ["namespace" => "App\Controllers\Api\V1\User"], function (RouteCollection $routes) {
            $routes->group("products", function (RouteCollection $routes) {
                $routes->get("", "ProductController::readProducts");
                $routes->get(":id", "ProductController::readProduct");
            });
        });
    });
});
