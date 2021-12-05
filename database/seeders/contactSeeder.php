<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'firstname' => Str::random(10),
	    'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(100),
            'created_at' => now()
        ]);

	DB::table('contacts')->insert([
            'firstname' => Str::random(10),
	    'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(100),
	    'created_at' => now()
        ]);

	DB::table('contacts')->insert([
            'firstname' => Str::random(10),
	    'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(100),
            'created_at' => now()
        ]);

	DB::table('contacts')->insert([
            'firstname' => Str::random(10),
	    'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(100),
            'created_at' => now()
        ]);

	DB::table('contacts')->insert([
            'firstname' => Str::random(10),
	    'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(100),
            'created_at' => now()
        ]);

	DB::table('contacts')->insert([
            'firstname' => Str::random(10),
	    'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(100),
            'created_at' => now()
        ]);
    }
}
