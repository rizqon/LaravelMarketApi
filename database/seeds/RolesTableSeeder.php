<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create.store']);
        Permission::create(['name' => 'update.store']);
        Permission::create(['name' => 'delete.store']);

        Permission::create(['name' => 'create.storefront']);
        Permission::create(['name' => 'update.storefront']);
        Permission::create(['name' => 'delete.storefront']);

        Permission::create(['name' => 'create.product']);
        Permission::create(['name' => 'update.product']);
        Permission::create(['name' => 'delete.product']);

        $customer = Role::create(['name' => 'customer']);


        $merchant = Role::create(['name' => 'merchant']);
        $merchant->givePermissionTo([
            'create.store',
            'update.store',
            'delete.store',

            'create.storefront',
            'update.storefront',
            'delete.storefront',

            'create.product',
            'update.product',
            'delete.product'
        ]);
    }
}
