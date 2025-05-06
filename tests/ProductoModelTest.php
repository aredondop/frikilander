<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\ProductoModel;

class ProductoModelTest extends TestCase
{
    protected ProductoModel $model;

    protected function setUp(): void
    {
        $this->model = new ProductoModel();
    }

    public function testFindAllReturnsArray()
    {
        $result = $this->model->findAll();
        $this->assertIsArray($result);
    }

    public function testFirstProductHasPrice()
    {
        $result = $this->model->findAll();

        if (!empty($result)) {
            $first = $result[0];
            $this->assertArrayHasKey('precio', $first);
        } else {
            $this->markTestSkipped('No hay productos en la base de datos.');
        }
    }
}
