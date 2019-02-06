<?php

use Illuminate\Database\Seeder;
use App\Model\User\User;

class StorefrontTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchant = User::where('email', 'merchant@kokon.com')->first();
        
        $merchant->storefronts()->create([
            'name' => 'baju anak',
            'slug' => 'baju-anak'
        ]);
    }
}