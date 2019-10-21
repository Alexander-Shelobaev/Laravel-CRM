<?php

namespace App\Http\Controllers\Users;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;
use DB;
use Gate;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. / Отображение списка ресурсов.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_users']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/users')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.users.users.index', [
            //'users' => User::paginate(10), // Записывает в users первые 10 записей из БД
            'users' => User::all() // Записывает в users все записи из БД
        ]);
    }

    /**
     * Show the form for creating a new resource. / Показать форму для создания нового ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_users','Add_users']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/users')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.users.users.create', [
            //'user' => [],
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage. / Сохраните вновь созданный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_users','Add_users']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/users')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar'=>'required',
        ]);

        // Обработка и сохранение изображений
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);// генерируем случайное число
            $str_min = $str.'_avatar.jpg';
            $img_min = Image::make($file);
            $img_min->fit(400, 400)->save(public_path().'/assets/img/user/'.$str_min);
            $request['avatar_name'] = $str_min;
            
            /*// Обработка изображения стандартным способом 
            $input['avatar'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets-landing/img',$input['avatar']);*/
        }

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'avatar' => $request['avatar_name'],
        ]);

        // $user_id = $newUser->id;

        // foreach ($request['checkbox-roles'] as $key => $value) {
        //     $role_id = $key;
        //     DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$user_id, $role_id]);
        // }

        return redirect()->route('users.index')->with('status','Запись добавлена');

    }

    /**
     * Display the specified resource. / Показать указанный ресурс.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. / Показать форму для редактирования указанного ресурса.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_users','Add_users']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/users')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $roles = Role::all();
        return view('admin.users.users.edit', [
            //'user' => $user,
            'value' => $user, // Объект записывается в переменную $value, которую мы передаем во view
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage. / Обновление указанного ресурса в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_users','Add_users']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/users')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }
        
        $validator = $request->validate([
            /*
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            */
            //Альтернативный вид записи
            'name' => 'required|string|max:255', // Обязательный|Строка|Максимум 255 символов
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id, // Обязательный|Строка|Email|Максимум 255 символов|Уникально в таблице users колонка email исключая и указаным id 
            'password' => 'nullable|string|min:8|confirmed', // Обязательный|Строка|Минимум 8 символов|confirmed????
        ]);

        // Обработка и сохранение изображений
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);// генерируем случайное число
            $str_min = $str.'_avatar.jpg';
            $img_min = Image::make($file);
            $img_min->fit(436, 327)->save(public_path().'/assets/img/user/'.$str_min);
            $request['avatar_name'] = $str_min;
            
            /*// Обработка изображения стандартным способом 
            $input['avatar'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets-landing/img',$input['avatar']);*/
        }else {
            $request['avatar_name'] = $request['old_avatar'];
        }unset($request['old_avatar']);

        // ID текущего пользователя
        $user_id = $user->id;

        // Выполняем запись в БД
        DB::transaction(function () use ($user_id, $user){
            global $request;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->avatar = $request['avatar_name'];
            $request['password'] == null ?: $user->password = bcrypt($request['password']);
            $user->save();

            // находим все роли для текущей пользователя по user_id
            $currentRoles = DB::select('select * from role_user where user_id = :id', ['id' => $user_id]);
            // сравниваем, при отсутствии совпадения удаляем
            foreach ($currentRoles as $currentRole) {
                
                $coincidence = 0;
                if ($request['checkbox-roles'] != null) {
                    foreach ($request['checkbox-roles'] as $requestCheckboxRole_id => $requestCheckboxRole) {
                        if ($currentRole->role_id == $requestCheckboxRole_id) {
                            // совпадение
                            $coincidence++;         
                        }
                    }
                }
                    
                if ($coincidence == 0) {
                    DB::delete('delete from role_user where user_id = :user_id and role_id = :role_id', ['user_id' => $user_id, 'role_id' => $currentRole->role_id]);
                }

            }

            if ($request['checkbox-roles'] != null) {
                // находим все роли для текущей пользователя по user_id
                $currentRoles = DB::select('select * from role_user where user_id = :id', ['id' => $user_id]);
                // сравниваем, при отсутствии совпадения добавляем

                foreach ($request['checkbox-roles'] as $requestCheckboxRole_id => $requestCheckboxRole) {

                    $coincidence = 0;
                    foreach ($currentRoles as $currentRole) {
                        if ($requestCheckboxRole_id == $currentRole->role_id) {
                            // совпадение
                            $coincidence++;
                        }
                    }
                    if ($coincidence == 0) {
                        DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$user_id, $requestCheckboxRole_id]);
                    }

                }
            }

        });

        return redirect()->route('users.index')->with('status','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage. / Удалить указаный ресурс из хранилища
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_users','Add_users']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/users')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        DB::transaction(function () use ($user){
            // Узнаем, есть ли у удаляемого пользователя роли
            // Если есть удалем роли, а после пользователя
            // находим все роли для текущей пользователя по user_id
            $currentRoles = DB::select('select * from role_user where user_id = :id', ['id' => $user->id]);
            if ($currentRoles != null) {
                foreach ($currentRoles as $currentRole) {
                        DB::delete('delete from role_user where user_id = :user_id and role_id = :role_id', ['user_id' => $user->id, 'role_id' => $currentRole->role_id]);
                }
            }

            // Если нет ролей, то удаляем пользователя
            $user->delete();
        });
        return redirect()->route('users.index')->with('status','Запись удалена');
    }
}
