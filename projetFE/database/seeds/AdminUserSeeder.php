<?php

use Illuminate\Database\Seeder;
use App\Administrateur;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrateur::create([
            "name"=>'rayhana',
            "email"=>"rayhana.sef1999@gmail.com",
            "password"=>bcrypt("123456"),
            
        ]);
    }
}
