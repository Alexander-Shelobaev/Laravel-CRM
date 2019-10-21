<?php

namespace App\Http\Controllers\Handbook;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Gate;

class StatesController extends Controller
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

        return view('admin.handbook.states.index', [
            //'states' => State::all(), // Записывает в states все записи из БД
            //'currencies' => State::find(10)->currencies, // Записывает в states все записи из 
            //'currencies' => State::with('currency')->where('id', '1')->get(),
            'states' => DB::table('states')
            ->join('currencies', 'states.currency_id', '=', 'currencies.id')
            ->select('states.id','states.name_state_en', 'states.name_state_ru', 'states.iso_code_3_state', 'states.iso_code_2_state', 'currencies.name_currency_en', 'states.solid_currency_id')
            ->get(),

            //$phone = User::find(1)->phone
            // $states = DB::table('states')->get()
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

        return view('admin.handbook.states.create', [
            'states' => []
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

        $validator = $request->validate([
            'name_state_en' => ['required', 'string', 'max:255'],
            'name_state_ru' => ['required', 'string', 'max:255'],
            'iso_code_3_state' => ['required', 'string', 'max:3'],
            'iso_code_2_state' => ['required', 'string', 'max:2'],
            'currency_id' => ['nullable', 'integer', 'max:999'],
            'solid_currency_id' => ['nullable','integer', 'max:999'],
        ]);

        State::create([
            'name_state_en' => $request['name_state_en'],
            'name_state_ru' => $request['name_state_ru'],
            'iso_code_3_state' => $request['iso_code_3_state'],
            'iso_code_2_state' => $request['iso_code_2_state'],
            'currency_id' => $request['currency_id'],
            'solid_currency_id' => $request['solid_currency_id'],
        ]);
        return redirect()->route('states.index')->with('status','Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook','Edit_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.states.edit', [
            'value' => $state, // Объект записывается в переменную $value, которую мы передаем во view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook','Edit_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'name_state_en' => ['required', 'string', 'max:255'],
            'name_state_ru' => ['required', 'string', 'max:255'],
            'iso_code_3_state' => ['required', 'string', 'max:3'],
            'iso_code_2_state' => ['required', 'string', 'max:2'],
            'currency_id' => ['nullable', 'integer', 'max:999'],
            'solid_currency_id' => ['nullable','integer', 'max:999'],
        ]);

        $state->name_state_en = $request['name_state_en'];
        $state->name_state_ru = $request['name_state_ru'];
        $state->iso_code_3_state = $request['iso_code_3_state'];
        $state->iso_code_2_state = $request['iso_code_2_state'];
        $state->currency_id = $request['currency_id'];
        $state->solid_currency_id = $request['solid_currency_id'];

        $state->save();

        return redirect()->route('states.index')->with('status','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_handbook','Del_handbook']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $state->delete();
        return redirect()->route('states.index')->with('status','Запись удалена');
    }
}
