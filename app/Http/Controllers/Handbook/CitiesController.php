<?php

namespace App\Http\Controllers\Handbook;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gate;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.cities.index', [
            'cities' => City::all() // Записывает в cities все записи из БД
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
        $code_access = serialize(['View_admin','View_handbook','Add_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.cities.create', [
            'cities' => []
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
        $code_access = serialize(['View_admin','View_handbook','Add_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        //dd($request);
        $validator = $request->validate([
            'name_city_en' => ['required', 'string', 'max:255'],
            'name_city_ru' => ['required', 'string', 'max:255'],
            'iata_code_city' => ['required', 'string', 'max:4'],
            'state_id' => ['nullable','integer', 'max:999'],
        ]);

        City::create([
            'name_city_en' => $request['name_city_en'],
            'name_city_ru' => $request['name_city_ru'],
            'iata_code_city' => $request['iata_code_city'],
            'state_id' => $request['state_id'],
        ]);
        return redirect()->route('cities.index')->with('status','Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook','Edit_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.cities.edit', [
            'value' => $city, // Объект записывается в переменную $value, которую мы передаем во view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook','Edit_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'name_city_en' => ['required', 'string', 'max:255'],
            'name_city_ru' => ['required', 'string', 'max:255'],
            'iata_code_city' => ['required', 'string', 'max:4'],
            'state_id' => ['nullable','integer', 'max:999'],
        ]);

        $city->name_city_en = $request['name_city_en'];
        $city->name_city_ru = $request['name_city_ru'];
        $city->iata_code_city = $request['iata_code_city'];
        $city->state_id = $request['state_id'];
        $city->save();

        return redirect()->route('cities.index')->with('status','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook','Del_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $city->delete();
        return redirect()->route('cities.index')->with('status','Запись удалена');
    }
}
