<?php

use Illuminate\Database\Seeder;
use App\Model\User\User;
use App\Model\Store\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchant = User::where('email', 'merchant@kokon.com')->first();
    
        $product = $merchant->products()->create([
            'title' => 'baju anak muslimah',
            'slug' => 'baju-anak-muslimah',
            'weight' => 1,
            'price' => 10000,
            'stock' => 10,
        ]);
        $storefronts = $merchant->storefronts()->first();
        
        $product->storefronts()->attach($storefronts);

        $product->category()->attach(Category::where('slug', 'fashion')->first());
    }
}