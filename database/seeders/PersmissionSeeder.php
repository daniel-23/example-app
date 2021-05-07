<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PersmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissions = [
    		'Security - access',
    		'Users - access',
    		'Users - create',
    		'Users - edit',
    		'Users - delete',
    		'Roles - access',
    		'Roles - create',
    		'Roles - edit',
    		'Roles - delete',
    		'Permissions - access',
    		'Permissions - create',
    		'Permissions - edit',
    		'Permissions - delete',
    	];

    	foreach ($permissions as $value) {
    		$permission = Permission::create(['name' => $value]);
    	}
    }
}
