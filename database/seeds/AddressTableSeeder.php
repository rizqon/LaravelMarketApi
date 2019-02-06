<?php

use Illuminate\Database\Seeder;
use App\Model\User\User;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = User::where('email', 'rizqon@kokon.com')->first();

        $customer->address()->create([
            'name' => 'Rumah',
            'phone' => '083726618829',
            'fulladdress' => 'Jl. Numpang Nampang no. 30',
            'province' => 'Yogyakarta',
            'kecamatan' => 'Depok'
        ]);
    }
}
