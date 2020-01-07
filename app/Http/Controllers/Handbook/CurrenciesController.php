<?php

namespace App\Http\Controllers\Handbook;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code_access = serialize(['View_admin', 'View_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.currencies.index', [
            'currencies' => Currency::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code_access = serialize(['View_admin', 'View_handbook', 'Add_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.currencies.create', [
            'currencies' => []
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
        $code_access = serialize(['View_admin', 'View_handbook', 'Add_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'name_currency_en' => ['required', 'string', 'max:255'],
            'name_currency_ru' => ['required', 'string', 'max:255'],
            'iso_4217_code_currency_literal' => ['required', 'string', 'max:4'],
            'iso_4217_code_currency_numeric' => ['required', 'integer', 'max:999'],
            'rounding_currency' => ['required', 'integer', 'max:4'],
            'method_rounding_currency' => ['nullable','integer', 'max:1'],
            'unicode' => ['nullable','string', 'max:10'],
        ]);

        Currency::create([
            'name_currency_en' => $request['name_currency_en'],
            'name_currency_ru' => $request['name_currency_ru'],
            'iso_4217_code_currency_literal' => $request['iso_4217_code_currency_literal'],
            'iso_4217_code_currency_numeric' => $request['iso_4217_code_currency_numeric'],
            'rounding_currency' => $request['rounding_currency'],
            'method_rounding_currency' => $request['method_rounding_currency'],
            'unicode' => $request['unicode'],

        ]);

        return redirect()->route('currencies.index')->with('status','Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        $code_access = serialize(['View_admin', 'View_handbook', 'Edit_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.currencies.edit', [
            'value' => $currency,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $code_access = serialize(['View_admin', 'View_handbook', 'Edit_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'name_currency_en' => ['required', 'string', 'max:255'],
            'name_currency_ru' => ['required', 'string', 'max:255'],
            'iso_4217_code_currency_literal' => ['required', 'string', 'max:4'],
            'iso_4217_code_currency_numeric' => ['required', 'integer', 'max:999'],
            'rounding_currency' => ['required', 'integer', 'max:4'],
            'method_rounding_currency' => ['nullable','integer', 'max:1'],
            'unicode' => ['nullable','string', 'max:10'],
        ]);

        $currency->name_currency_en = $request['name_currency_en'];
        $currency->name_currency_ru = $request['name_currency_ru'];
        $currency->iso_4217_code_currency_literal = $request['iso_4217_code_currency_literal'];
        $currency->iso_4217_code_currency_numeric = $request['iso_4217_code_currency_numeric'];
        $currency->rounding_currency = $request['rounding_currency'];
        $currency->method_rounding_currency = $request['method_rounding_currency'];
        $currency->unicode = $request['unicode'];
        $currency->save();

        return redirect()->route('currencies.index')->with('status', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $code_access = serialize(['View_admin', 'View_handbook', 'Del_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        $currency->delete();
        return redirect()->route('currencies.index')->with('status', 'Запись удалена');
    }
}
