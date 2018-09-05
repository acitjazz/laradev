<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->insert([
		    ['name' => 'admin', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		    ['name' => 'member', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
		]);
    }
}
