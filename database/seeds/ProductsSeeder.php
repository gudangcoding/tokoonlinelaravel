<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sepatu = Category::create(['title'=>'Sepatu']);
        $sepatu->childs()->saveMany([
            new Category(['title'=>'Lifestyle']),
            new Category(['title'=>'Berlari']),
            new Category(['title'=>'Basket']),
            new Category(['title'=>'Sepakbola']),
        ]);

        $pakaian = Category::create(['title'=>'Pakaian']);
        $pakaian->childs()->saveMany([
            new Category(['title'=>'Jaket']),
            new Category(['title'=>'Hoodie']),
            new Category(['title'=>'Rompi'])
        ]);

        //simple product
        $running = Category::where('title', 'Berlari')->first();
        $lifestyle = Category::where('title', 'Lifestyle')->first();
        $sepatu1 = Product::create([
            'name'=> 'Nike Air Force',
            'model'=> 'Sepatu Pria',
            'weight'=>rand(1,3) *1000,
            'photo'=>'sepatu.jpeg',
            'price'=> 340000]);


        $sepatu2 = Product::create([
            'name'=> 'Nike Air Max',
            'model'=> 'Sepatu Wanita',
            'weight'=>rand(1,3) *1000,
            'photo'=>'sepatu2.jpg',
            'price'=> 310000]);

        $sepatu3 = Product::create([
            'name'=> 'Nike Air Zoom',
            'model'=> 'Sepatu Wanita',
            'weight'=>rand(1,3) *1000,
            'photo'=>'sepatu3.png',
            'price'=> 300000]);

        $running->products()->saveMany([$sepatu1, $sepatu2, $sepatu3]);
        $lifestyle->products()->saveMany([$sepatu1, $sepatu2]);

        $jaket = Category::where('title', 'jaket')->first();
        $vest = Category::where('title', 'rompi')->first();

        $jaket1 = Product::create([
            'name'=>'Nike Aerolf Boomber',
            'model'=>'Jaket Wanita',
            'photo'=>'jaket1.jpg',
            'weight'=>rand(1,3) *1000,
            'price'=>890000]);

        $jaket2 = Product::create([
            'name'=>'Nike Gulp Boomber',
            'model'=>'Jaket Pria',
            'photo'=>'jaket2.jpeg',
            'weight'=>rand(1,3) *1000,
            'price'=>89000]);

        $jaket3 = Product::create([
            'name'=>'Nike SB',
            'model'=>'Jaket Pria',
            'photo'=>'jaket3.jpg',
            'weight'=>rand(1,3) *1000,
            'price'=>890000]);

        $jaket->products()->saveMany([$jaket1, $jaket2]);
        $vest->products()->saveMany([$jaket2, $jaket3]);

        //copy image simple to public folder
        $from =  database_path(). DIRECTORY_SEPARATOR. 'seeds'. DIRECTORY_SEPARATOR. 'img' .DIRECTORY_SEPARATOR;
        $to = public_path() .DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR;
        File::copy($from. 'jaket1.jpg', $to. 'jaket1.jpg');
        File::copy($from. 'jaket2.jpeg', $to. 'jaket2.jpeg');
    }
}
