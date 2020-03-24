<?php

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array (
            0 => 
            array (
              'title' => 'The Shawshank Redemption',
              'rate' => 15600,
              'category' => 'Drama',
              'quantity' => 3,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            1 => 
            array (
              'title' => 'The Godfather: Beginning',
              'rate' => 14750,
              'category' => 'Adventure',
              'quantity' => 5,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T11:32:39.000000Z',
            ),
            2 => 
            array (
              'title' => 'American Psycho',
              'rate' => 15000,
              'category' => 'Drama',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            3 => 
            array (
              'title' => 'Pulp Fiction',
              'rate' => 15000,
              'category' => 'Drama',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            4 => 
            array (
              'title' => 'The Prestige',
              'rate' => 11900,
              'category' => 'Drama',
              'quantity' => 6,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            5 => 
            array (
              'title' => 'Interstellar',
              'rate' => 15000,
              'category' => 'Drama',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            6 => 
            array (
              'title' => 'The Godfather 2',
              'rate' => 13500,
              'category' => 'Crime',
              'quantity' => 2,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            7 => 
            array (
              'title' => 'The Dark Knight',
              'rate' => 15000,
              'category' => 'Crime',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            8 => 
            array (
              'title' => 'American Psycho 2',
              'rate' => 11500,
              'category' => 'Crime',
              'quantity' => 6,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            9 => 
            array (
              'title' => 'Pulp Fiction 2',
              'rate' => 9000,
              'category' => 'Crime',
              'quantity' => 7,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            10 => 
            array (
              'title' => 'The Wolf of Wall Street',
              'rate' => 15000,
              'category' => 'Crime',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            11 => 
            array (
              'title' => 'The Dark Knight 2',
              'rate' => 16500,
              'category' => 'Action',
              'quantity' => 3,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            12 => 
            array (
              'title' => 'The Matrix',
              'rate' => 15000,
              'category' => 'Action',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            13 => 
            array (
              'title' => 'Logan',
              'rate' => 15000,
              'category' => 'Action',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            14 => 
            array (
              'title' => 'The Dark Knight 3',
              'rate' => 12000,
              'category' => 'Comic Book',
              'quantity' => 2,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            15 => 
            array (
              'title' => 'Logan 2',
              'rate' => 10500,
              'category' => 'Comic Book',
              'quantity' => 5,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            16 => 
            array (
              'title' => 'The Matrix',
              'rate' => 15000,
              'category' => 'Sci-Fi',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            17 => 
            array (
              'title' => 'Logan 3',
              'rate' => 14300,
              'category' => 'Sci-Fi',
              'quantity' => 6,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            18 => 
            array (
              'title' => 'Interstellar 2',
              'rate' => 15700,
              'category' => 'Sci-Fi',
              'quantity' => 3,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            19 => 
            array (
              'title' => 'The Prestige 2',
              'rate' => 11800,
              'category' => 'Mystery',
              'quantity' => 3,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            20 => 
            array (
              'title' => 'Interstellar 3',
              'rate' => 15800,
              'category' => 'Adventure',
              'quantity' => 4,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            21 => 
            array (
              'title' => 'The Wolf of Wall Street 2',
              'rate' => 16000,
              'category' => 'Comedy',
              'quantity' => 2,
              'created_at' => '2020-03-23T10:58:36.000000Z',
              'updated_at' => '2020-03-23T10:58:36.000000Z',
            ),
            22 => 
            array (
              'title' => 'The Body',
              'rate' => 14350,
              'category' => 'Mystery',
              'quantity' => 5,
              'created_at' => '2020-03-23T10:58:43.000000Z',
              'updated_at' => '2020-03-23T10:58:43.000000Z',
            ),
        );
        foreach($data as $d) {
            Stock::create([
                'title' => $d['title'],
                'rate'  => $d['rate'],
                'category'  => $d['category'],
                'quantity'  => $d['quantity']
            ]);
        }
    }
}
