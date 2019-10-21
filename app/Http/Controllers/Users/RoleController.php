<?php

namespace App\Http\Controllers\Users;

use App\Permission;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use DB;
use Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource. / Отображение списка ресурсов.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_roles']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/roles')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.users.roles.index', [
            'roles' => Role::all() // Записывает в переменную все записи из БД
        ]);
    }

    /**
     * Show the form for creating a new resource. / Показать форму для создания нового ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.roles.create', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage. / Сохраните вновь созданный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/roles')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку полученных данных из $request
        $validator = $request->validate([
            'name'=>'required|max:100|unique:roles',
            'code'=>'required|max:100|unique:roles',
        ]);

        // Выполняем запись в БД
        DB::transaction(function () {
            global $request;
            $newRole = Role::create([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            if(isset($request['checkbox-permissions'])){
                $role_id = $newRole->id;
                foreach ($request['checkbox-permissions'] as $key => $value) {
                    $permission_id = $key;
                    DB::insert('insert into permission_role (role_id, permission_id) values (?, ?)', [$role_id, $permission_id]);
                }
            }
        });
        
        return redirect()->route('roles.index')->with('status','Запись добавлена');
    }

    /**
     * Display the specified resource. / Показать указанный ресурс.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. / Показать форму для редактирования указанного ресурса.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/roles')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.users.roles.edit', [
            'value' => $role, // Объект записывается в переменную $value, которую мы передаем во view
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage. / Обновление указанного ресурса в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/roles')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку полученных данных из $request
        $validator = $request->validate([
            'name'=>'required|max:100',
            Rule::unique('roles')->ignore($role->id),
            'code'=>'required|max:100',
            Rule::unique('roles')->ignore($role->id),
        ]);
        
        // ID текущей роли
        $role_id = $role->id;

        // Выполняем запись в БД
        DB::transaction(function () use ($role_id){
            global $request;
            $role = Role::where('id', $role_id)
            ->update([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            

            // находим все доступы для текущей роли role_id
            $currentPermissions = DB::select('select * from permission_role where role_id = :id', ['id' => $role_id]);
            // сравниваем доступы текущей роли с доступами из $request, при отсутствии совпадения удаляем
            foreach ($currentPermissions as $currentPermission) {
                
                $coincidence = 0;
                if ($request['checkbox-permissions'] != null) {
                    foreach ($request['checkbox-permissions'] as $requestCheckboxPermission_id => $requestCheckboxPermission) {
                        if ($currentPermission->permission_id == $requestCheckboxPermission_id) {
                            // совпадение
                            $coincidence++;         
                        }
                    }
                }
                if ($coincidence == 0) {
                    DB::delete('delete from permission_role where id = :id', ['id' => $currentPermission->id]);
                }

            }


            // сравниваем доступы текущей роли с доступами из $request, при отсутствии совпадения добавляем доступ из $request
            if ($request['checkbox-permissions'] != null) {
                // находим все доступы для текущей роли role_id
                $currentPermissions = DB::select('select * from permission_role where role_id = :id', ['id' => $role_id]);
                // сравниваем, при отсутствии совпадения добавляем
                foreach ($request['checkbox-permissions'] as $requestCheckboxPermission_id => $requestCheckboxPermission) {

                    $coincidence = 0;
                    foreach ($currentPermissions as $currentPermission){
                        if ($requestCheckboxPermission_id == $currentPermission->permission_id) {
                            // совпадение
                            $coincidence++;
                        }
                    }
                    if ($coincidence == 0) {

                        DB::insert('insert into permission_role (role_id, permission_id) values (?, ?)', [$role_id, $requestCheckboxPermission_id]);
                    }

                }
            }
        });

        return redirect()->route('roles.index')->with('status','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage. / Удалить указаный ресурс из хранилища
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/roles')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Узнаем, используют ли пользователи данную роль
        $idCurrentRole = $role->id;
        $coincidence = 0;
        $users = User::all();
        foreach ($users as $key => $user) {
            $roles = $user->roles;
            foreach ($roles as $key => $userRole) {
                if ($idCurrentRole == $userRole->id) {
                    $coincidence++;
                    $userName[] = $user->name;
                }
            }
        }

        // Удаляем данную роль, если она не используется пользователем/пользователями
        if ($coincidence == 0) {
            // Удаляем доступы привязанные к данной роли
            DB::transaction(function () use ($idCurrentRole) {
                // находим все доступы для текущей роли idCurrentRole
                $currentPermissions = DB::select('select * from permission_role where role_id = :id', ['id' => $idCurrentRole]);
                //dd($currentPermissions);
                foreach ($currentPermissions as $currentPermission) {
                    DB::delete('delete from permission_role where id = :id', ['id' => $currentPermission->id]);
                }

                // Удаляем данную роль
                DB::delete('delete from roles where id = :id', ['id' => $idCurrentRole]);                
            });
            return redirect()->route('roles.index')->with('status','Запись удалена');
        }

        // Выводим сообщение, что данную роль нельзя удалить
        $userName = implode(", ", $userName);
        return redirect()->route('roles.index')->with('status-error','Данную роль нельзя удалить, так-как она используется пользователем/пользователями: '.$userName);
    }

}
