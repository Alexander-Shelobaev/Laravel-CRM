<?php

use Illuminate\Database\Seeder;
use App\User;
// php artisan db:seed --class=seedUsers
class seedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>"Alex",'email'=>'Alex@gmail.com','password'=> bcrypt(98224356),'avatar'=>'user-13.jpg']);
        User::create(['name'=>"John",'email'=>'John@gmail.com','password'=> bcrypt(12345678),'avatar'=>'user-1.jpg']);
        User::create(['name'=>"Morgan",'email'=>'Morgan@gmail.com','password'=> bcrypt(12345678),'avatar'=>'user-2.jpg']);
        User::create(['name'=>"Smith",'email'=>'Smith@gmail.com','password'=> bcrypt(12345678),'avatar'=>'user-4.jpg']);
        User::create(['name'=>"Robert",'email'=>'Robert@gmail.com','password'=> bcrypt(12345678),'avatar'=>'user-6.jpg']);
        User::create(['name'=>"Sarah",'email'=>'Sarah@gmail.com','password'=> bcrypt(12345678),'avatar'=>'user-18.jpg']);
    }
}

