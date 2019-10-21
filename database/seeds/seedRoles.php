<?php

use Illuminate\Database\Seeder;
use App\Role;
// php artisan db:seed --class=seedRoles
class seedRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Администратор','code'=>'Admin']);
        Role::create(['name'=>'Модератор','code'=>'Moderator']);
        Role::create(['name'=>'Контент менеджер','code'=>'Content_manager']);
        Role::create(['name'=>'Редактор раздела справочники','code'=>'Edactor_handbook']);
    }
}
