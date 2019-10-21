<?php

namespace App\Http\Controllers\Content;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gate;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Add_content','Edit_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.services.index', [
            //'users' => User::paginate(10), // Записывает в users первые 10 записей из БД
            'services' => Service::all() // Записывает в users все записи из БД
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Add_content','Edit_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.services.create', [
            'services' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Add_content','Edit_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'title'=>'required|max:100',
            'alias'=>'required|max:100|unique:services,alias', 
            'short_text'=>'required|max:100',
            'img'=>'required|max:100',
            'description'=>'required',
            'created_at'=>'required',               
        ]);
        Service::create([
            'title' => $request['title'],
            'alias' => $request['alias'],
            'short_text' => $request['short_text'],
            'img' => $request['img'],
            'description' => $request['description'],
            'created_at' => $request['created_at'],
        ]);
        return redirect()->route('services.index')->with('status','Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Add_content','Edit_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.services.edit', [
            //'user' => $user,
            'value' => $service, // Объект записывается в переменную $value, которую мы передаем во view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Add_content','Edit_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'title'=>'required|max:100',
            'alias'=>'required|max:100|unique:services,alias,'.$service->id,
            'short_text'=>'required|max:100',
            'img'=>'required',
            'description'=>'required',
            'created_at'=>'required',               
        ]);

        $service->title = $request['title'];
        $service->alias = $request['alias'];
        $service->short_text = $request['short_text'];
        $service->img = $request['img'];
        $service->description = $request['description'];
        $service->created_at = $request['created_at'];
        $service->save();

        return redirect()->route('services.index')->with('status','Запись обновлена');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Add_content','Edit_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $service->delete();
        return redirect()->route('services.index')->with('status','Запись удалена');
    }
}
