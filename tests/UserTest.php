<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    // use DatabaseMigrations;
    use DatabaseTransactions;
    public function testShouldReturnAllStocks() {
        $this->get('/stocks');
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'data' => ['*' => [
                'title',
                'rate',
                'category',
                'quantity',
                'created_at',
                'updated_at'
            ]]
        ]);
    }
    public function testShouldInsertNewStock() {
        $params = [
            'title' => 'Avengers: End Game',
            'rate' => 18500,
            'category' => 'Action',
            'quantity' => 2
        ];
        $this->post('/stocks', $params);
        $this->seeInDatabase('stocks', ['title' => 'Avengers: End Game']);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'stock_id'
        ]);
    }
    public function testShouldReturnInserStockValidation() {
        $params = [
            'title' => 'Avengers: End Game',
            'rate' => 18500,
            'category' => 'Action'
        ];
        $this->post('/stocks', $params);
        $this->seeStatusCode(422);
        $this->seeJsonStructure([
            'quantity'
        ]);
    }
    public function testShouldReturnStockData() {
        $this->get('/stocks/5');
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'data' => [
                'id',
                'title',
                'rate',
                'category',
                'quantity',
                'created_at',
                'updated_at'
            ]
        ]);
    }
    public function testShouldUpdateStock() {
        $params = [
            'quantity' => 2
        ];
        $this->put('/stocks/4', $params);
        $this->seeInDatabase('stocks', ['quantity' => 2]);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message'
        ]);
    }
    public function testShouldReturnUpdateStockValidation() {
        $this->post('/stocks', []);
        $this->seeStatusCode(422);
        $this->seeJsonStructure([
            'quantity'
        ]);
    }
    public function testShouldReturnSubmitRentOrderValidation() {
        $this->post('/rent', []);
        $this->seeStatusCode(422);
        $this->seeJsonStructure([
            'stock_id',
            'member_id'
        ]);
    }
    public function testShouldSubmitRentOrder() {
        $params = [
            'stock_id' => 8,
            'member_id' => 9
        ];
        $this->post('/rent', $params);
        $this->seeInDatabase('orders', $params);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message'
        ]);
    }
}
