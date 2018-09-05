<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
		    ['name' => 'admin', 
		     'email' => 'admin@laradev.test', 
             'password' => bcrypt('asdasd'),
             'verified' => true,
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['name' => 'member', 
		     'email' => 'member@laradev.test', 
             'password' => bcrypt('asdasd'),
             'verified' => false,
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()]
		]);
    	DB::table('roles')->insert([
		    ['name' => 'admin', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		    ['name' => 'member', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
		]);
    	DB::table('permissions')->insert([
		    ['name' => 'all', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
		    ['name' => 'read', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
		]);
    	DB::table('role_has_permissions')->insert([
		    ['permission_id' => 1, 'role_id' => 1],
		    ['permission_id' => 2, 'role_id' => 1],
		    ['permission_id' => 2, 'role_id' => 2],
		]);
    	DB::table('model_has_roles')->insert([
		    ['role_id' => 1, 'model_id' => 1, 'model_type' => 'App\Models\User'],
		    ['role_id' => 2, 'model_id' => 2, 'model_type' => 'App\Models\User'],
		]);
    	DB::table('model_has_permissions')->insert([
		    ['permission_id' => 1, 'model_id' => 1, 'model_type' => 'App\Models\User'],
		    ['permission_id' => 2, 'model_id' => 1, 'model_type' => 'App\Models\User'],
		]);
    	DB::table('options')->insert([
		    ['title' => 'domain', 
		     'value' => 'https://laradev.test',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'web_title', 
		     'value' => 'Project Title',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'web_description', 
		     'value' => 'Laravel web description',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'web_keyword', 
		     'value' => 'Website, Keyword',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'copyright', 
		     'value' => 'Copyright © 2018 Laradev Corporation',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'facebook_url', 
		     'value' => '#',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'twitter_url', 
		     'value' => '#',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'instagram_url', 
		     'value' => '#',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'youtube_url', 
		     'value' => '#',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'google_url', 
		     'value' => '#',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		    ['title' => 'google_analytic', 
		     'value' => '',
		     'created_at' => Carbon::now(), 
		     'updated_at' => Carbon::now()
		 	],
		]);
    }
}
