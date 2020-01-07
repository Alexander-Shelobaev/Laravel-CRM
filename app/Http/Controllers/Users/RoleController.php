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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
        $code_access = serialize(['View_admin','View_roles']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/user-management/roles')
            ->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.users.roles.index', [
            // Записывает в переменную все записи из БД
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/user-management/roles')
            ->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
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
            if (isset($request['checkbox-permissions'])) {
                $role_id = $newRole->id;
                foreach ($request['checkbox-permissions'] as $key => $value) {
                    $permission_id = $key;
                    DB::insert(
                        'insert into permission_role (role_id, permission_id) values (?, ?)',
                        [$role_id, $permission_id]
                    );
                }
            }
        });
        return redirect()->route('roles.index')->with('status', 'Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/user-management/roles')
            ->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.users.roles.edit', [
            'value' => $role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/user-management/roles')
            ->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'name'=>'required|max:100',
            Rule::unique('roles')->ignore($role->id),
            'code'=>'required|max:100',
            Rule::unique('roles')->ignore($role->id),
        ]);
        
        // ID текущей роли
        $role_id = $role->id;

        // Выполняем запись в БД
        DB::transaction(function () use ($role_id) {
            global $request;
            $role = Role::where('id', $role_id)
            ->update([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            

            // Находим все доступы для текущей роли role_id
            $permissions = DB::select('select * from permission_role where role_id = :id', ['id' => $role_id]);
            // Сравниваем доступы текущей роли с доступами из $request, при отсутствии совпадения удаляем
            foreach ($permissions as $permission) {
                $coincidence = 0;
                if ($request['checkbox-permissions'] != null) {
                    foreach ($request['checkbox-permissions'] as $permission_id => $requestCheckboxPermission) {
                        if ($permission->permission_id == $permission_id) {
                            $coincidence++;         
                        }
                    }
                }
                if ($coincidence == 0) {
                    DB::delete('delete from permission_role where id = :id', ['id' => $permission->id]);
                }
            }


            // Сравниваем доступы текущей роли с доступами из $request,
            // при отсутствии совпадения добавляем доступ из $request
            if ($request['checkbox-permissions'] != null) {
                // Находим все доступы для текущей роли role_id
                $permissions = DB::select(
                    'select * from permission_role where role_id = :id',
                    ['id' => $role_id]
                );
                // Сравниваем, при отсутствии совпадения добавляем
                foreach ($request['checkbox-permissions'] as $permission_id => $requestCheckboxPermission) {
                    $coincidence = 0;
                    foreach ($permissions as $permission) {
                        if ($permission_id == $permission->permission_id) {
                            $coincidence++;
                        }
                    }
                    if ($coincidence == 0) {
                        DB::insert(
                            'insert into permission_role (role_id, permission_id) values (?, ?)',
                            [$role_id, $permission_id]
                        );
                    }
                }
            }
        });
        return redirect()->route('roles.index')->with('status', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $code_access = serialize(['View_admin','View_roles','Add_roles']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/user-management/roles')
            ->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
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
                // Находим все доступы для текущей роли idCurrentRole
                $permissions = DB::select(
                    'select * from permission_role where role_id = :id',
                    ['id' => $idCurrentRole]
                );
                foreach ($permissions as $permission) {
                    DB::delete('delete from permission_role where id = :id', ['id' => $permission->id]);
                }

                // Удаляем данную роль
                DB::delete('delete from roles where id = :id', ['id' => $idCurrentRole]);                
            });
            return redirect()->route('roles.index')->with('status', 'Запись удалена');
        }

        // Выводим сообщение, что данную роль нельзя удалить
        $userName = implode(", ", $userName);
        return redirect()->route('roles.index')->with(
            'status-error',
            'Данную роль нельзя удалить, так-как она используется пользователем/пользователями: '.$userName
        );
    }

}
