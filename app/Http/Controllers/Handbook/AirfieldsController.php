<?php

namespace App\Http\Controllers\Handbook;

use App\Airfield;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class AirfieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code_access = serialize(['View_admin','View_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.airfields.index', [
            'airfields' => Airfield::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code_access = serialize(['View_admin','View_handbook','Add_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.airfields.create', [
            'airfields' => []
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
        $code_access = serialize(['View_admin','View_handbook','Add_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'name_airfield_en' => ['required', 'string', 'max:255'],
            'name_airfield_ru' => ['nullable', 'string', 'max:255'],
            'iata_code_airfield' => ['required', 'string', 'max:4'],
            'latitude' => ['nullable', 'string', 'max:16'],
            'longitude' => ['nullable', 'string', 'max:16'],
            'time_zone' => ['nullable', 'string', 'max:16'],
            'city_id' => ['nullable','integer', 'max:999'],
        ]);

        Airfield::create([
            'name_airfield_en' => $request['name_airfield_en'],
            'name_airfield_ru' => $request['name_airfield_ru'],
            'iata_code_airfield' => $request['iata_code_airfield'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'time_zone' => $request['time_zone'],
            'city_id' => $request['city_id'],
        ]);

        return redirect()->route('airfields.index')->with('status', 'Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airfield  $airfield
     * @return \Illuminate\Http\Response
     */
    public function show(Airfield $airfield)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airfield  $airfield
     * @return \Illuminate\Http\Response
     */
    public function edit(Airfield $airfield)
    {
        $code_access = serialize(['View_admin','View_handbook','Edit_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.handbook.airfields.edit', [
            'value' => $airfield,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airfield  $airfield
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airfield $airfield)
    {
        $code_access = serialize(['View_admin','View_handbook','Edit_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'name_airfield_en' => ['required', 'string', 'max:255'],
            'name_airfield_ru' => ['nullable', 'string', 'max:255'],
            'iata_code_airfield' => ['required', 'string', 'max:4'],
            'latitude' => ['nullable', 'string', 'max:16'],
            'longitude' => ['nullable', 'string', 'max:16'],
            'time_zone' => ['nullable', 'string', 'max:16'], 
            'city_id' => ['nullable','integer', 'max:999'],
        ]);

        $airfield->name_airfield_en = $request['name_airfield_en'];
        $airfield->name_airfield_ru = $request['name_airfield_ru'];
        $airfield->iata_code_airfield = $request['iata_code_airfield'];
        $airfield->latitude = $request['latitude'];
        $airfield->longitude = $request['longitude'];
        $airfield->time_zone = $request['time_zone'];
        $airfield->city_id = $request['city_id'];
        $airfield->save();

        return redirect()->route('airfields.index')->with('status', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airfield  $airfield
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airfield $airfield)
    {
        $code_access = serialize(['View_admin','View_handbook','Del_handbook']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        $airfield->delete();
        return redirect()->route('airfields.index')->with('status', 'Запись удалена');
    }
}
