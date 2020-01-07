<?php

use Illuminate\Database\Seeder;
use App\Permission;

// php artisan db:seed --class=seedPermissions

class seedPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        Permission::create(['name'=>'Просмотр админ. панели','code'=>'View_admin']);

        Permission::create(['name'=>'Просмотр раздела пользователи','code'=>'View_users']);
        Permission::create(['name'=>'Добавление пользователей','code'=>'Add_users']);
        Permission::create(['name'=>'Редактирование пользователей','code'=>'Edit_users']);
        Permission::create(['name'=>'Удаление пользователей','code'=>'Del_users']);

        Permission::create(['name'=>'Просмотр раздела роли','code'=>'View_roles']);
        Permission::create(['name'=>'Добавление ролей','code'=>'Add_roles']);
        Permission::create(['name'=>'Редактирование ролей','code'=>'Edit_roles']);
        Permission::create(['name'=>'Удаление ролей','code'=>'Del_roles']);

        Permission::create(['name'=>'Просмотр раздела доступов','code'=>'View_permissions']);
        Permission::create(['name'=>'Добавление доступов','code'=>'Add_permissions']);
        Permission::create(['name'=>'Редактирование доступов','code'=>'Edit_permissions']);
        Permission::create(['name'=>'Удаление доступов','code'=>'Del_permissions']);

        Permission::create(['name'=>'Просмотр раздела контент','code'=>'View_content']);
        Permission::create(['name'=>'Добавление контента','code'=>'Add_content']);
        Permission::create(['name'=>'Редактирование контента','code'=>'Edit_content']);
        Permission::create(['name'=>'Удаление контента','code'=>'Del_content']);

        Permission::create(['name'=>'Просмотр раздела справочники','code'=>'View_handbook']);
        Permission::create(['name'=>'Добавление справочников','code'=>'Add_handbook']);
        Permission::create(['name'=>'Редактирование справочников','code'=>'Edit_handbook']);
        Permission::create(['name'=>'Удаление справочников','code'=>'Del_handbook']);

        Permission::create(['name'=>'Доступ в чат','code'=>'View_chat']);


    }
}
