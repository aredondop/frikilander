<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\EntidadModel;

class EntidadModelTest extends TestCase
{
    protected EntidadModel $model;

    protected function setUp(): void
    {
        $this->model = new EntidadModel();
    }

    public function testFindAllReturnsArray()
    {
        $result = $this->model->findAll();
        $this->assertIsArray($result);
    }

    public function testFirstEntityHasExpectedFields()
    {
        $result = $this->model->findAll();

        if (!empty($result)) {
            $first = $result[0];
            $this->assertArrayHasKey('id', $first);
            $this->assertArrayHasKey('nombre', $first);
            $this->assertArrayHasKey('descripcion', $first);
        } else {
            $this->markTestSkipped('No hay entidades en la base de datos.');
        }
    }
}
