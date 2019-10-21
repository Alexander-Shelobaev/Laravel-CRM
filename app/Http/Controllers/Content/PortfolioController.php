<?php

namespace App\Http\Controllers\Content;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

use Gate;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.portfolio.index', [
            'portfolios' => Portfolio::all() // Записывает в users все записи из БД
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
        $code_access = serialize(['View_admin','View_content','Add_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.portfolio.create', [
            'portfolio' => []
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
        $code_access = serialize(['View_admin','View_content','Add_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'title'=>'required|max:100',
            'short_text'=>'required|max:255',
            'href'=>'required|max:100',
            'img'=>'required',             
        ]);

        // Обработка и сохранение изображений
        if($request->hasFile('img')) {
            $file = $request->file('img');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);// генерируем случайное число
            $str_min = $str.'_announce.jpg';
            $img_min = Image::make($file);
            $img_min->fit(436, 327)->save(public_path().'/assets-landing/img/'.$str_min);
            $request['img_name'] = $str_min;
        }
        //dd($request);
        // Сохранение в БД
        Portfolio::create([
            'title' => $request['title'],
            'short_text' => $request['short_text'],
            'href' => $request['href'],
            'img' => $request['img_name'],
        ]);

        return redirect()->route('portfolios.index')->with('status','Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Edit_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.portfolio.edit', [
            'value' => $portfolio, // Объект записывается в переменную $value, которую мы передаем во view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Edit_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $validator = $request->validate([
            'title'=>'required|max:100',
            'short_text'=>'required|max:255',
            'href'=>'required|max:100',
            //'img'=>'required',             
        ]);

        // Обработка и сохранение изображений
        if($request->hasFile('img')) {
            $file = $request->file('img');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);// генерируем случайное число
            $str_min = $str.'_announce.jpg';
            $img_min = Image::make($file);
            $img_min->fit(436, 327)->save(public_path().'/assets-landing/img/'.$str_min);
            $request['img_name'] = $str_min;
            
        }else {
            $request['img_name'] = $request['old_picture_announce'];
        }unset($request['old_picture_announce']);

        $portfolio->title = $request['title'];
        $portfolio->short_text = $request['short_text'];
        $portfolio->href = $request['href'];
        $portfolio->img = $request['img_name'];
        $portfolio->save();

        return redirect()->route('portfolios.index')->with('status','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin','View_content','Del_content']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/content/services')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('status','Запись удалена');
    }
}
