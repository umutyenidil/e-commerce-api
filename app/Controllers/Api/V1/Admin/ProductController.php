<?php

namespace App\Controllers\Api\V1\Admin;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

use Ramsey\Uuid\Uuid;
use App\Models\ProductModel;

class ProductController extends ResourceController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }


    /**
     * reads all products from database
     * METHOD: GET
     * @return ResponseInterface
     */
    public function readProducts(): ResponseInterface
    {
        $products = $this->productModel->findAll();

        return $this->respond([
            "code" => "200",
            "message" => "success",
            "data" => [
                "products" => $products,
            ],
        ], 200);
    }

    /**
     * read user with id from database
     * METHOD: GET
     * @return ResponseInterface
     */
    public function readProduct(): ResponseInterface
    {
        $productId = "5905c570-23af-4648-ad61-86a03e869fc7";

        $product = $this->productModel->find($productId);

        return $this->respond([
            "code" => "200",
            "message" => "success",
            "data" => [
                "products" => $product,
            ],
        ], 200);
    }

    public function createProduct(): ResponseInterface
    {
        $incomingData = $this->request->getJSON(true)["data"];

        $productUuid = Uuid::uuid4()->toString();
        $data = [
            "id" => $productUuid,
            "name" => $incomingData["name"],
            "description" => $incomingData["description"],
        ];

        $isProductCreated = $this->productModel->insert($data);

        if ($isProductCreated) {
            return $this->respond([
                "code" => "201",
                "message" => "success",
                "data" => $data,
            ], 201);
        } else {
            return $this->respond([
                "code" => "500",
                "message" => "Something went wrong",
            ], 500);
        }


    }

    public function updateProduct(): ResponseInterface
    {
        $productId = "";

        $incomingData = $this->request->getJSON(true)["data"];

        $isProductUpdated = $this->productModel->update([
            "id" => $productId,
        ], $incomingData);

        if ($isProductUpdated) {
            return $this->respond([
                "code" => "204",
                "message" => "success",
            ], 204);
        } else {
            return $this->respond([
                "code" => "304",
                "message" => "Something went wrong",
            ], 304);
        }

    }


    public function deleteProduct(): ResponseInterface
    {
        $productId = '';

        $isProductDeleted = $this->productModel->delete($productId);

        if ($isProductDeleted) {
            return $this->respond([
                "code" => "204",
                "message" => "success",
            ], 204);
        } else {
            return $this->respond([
                "code" => "500",
                "message" => "Something went wrong",
            ], 500);
        }
    }
}

