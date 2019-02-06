<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\User\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $customer = new User;
        $customer->name = 'rizqon';
        $customer->email = 'rizqon@kokon.com';
        $customer->password = bcrypt('secret');
        $customer->save();
        $customer->assignRole('customer');


        $merchant = new User;
        $merchant->name = 'merchant';
        $merchant->email = 'merchant@kokon.com';
        $merchant->password = bcrypt('secret');
        $merchant->save();
        $merchant->assignRole('merchant');

    }
}
