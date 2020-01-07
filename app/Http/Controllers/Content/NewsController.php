<?php

namespace App\Http\Controllers\Content;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Gate;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code_access = serialize(['View_admin', 'View_content']);
        // Метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
        if (Gate::denies('Access_check', $code_access)) { 
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.news.index', [
            'news' => News::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code_access = serialize(['View_admin','View_content','Add_content']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.news.create', [
            'news' => []
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
        $code_access = serialize(['View_admin', 'View_content', 'Add_content']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'headline'=>'required|max:100',
            'alias'=>'required|max:100|unique:news,alias', 
            'desc_announce'=>'required|max:255',
            'picture_announce'=>'required',
            'detailed_desc'=>'required',
            'detailed_picture'=>'required',
            'created_at'=>'required',               
        ]);

        // Обработка и сохранение изображений
        if ($request->hasFile('picture_announce')) {
            $file = $request->file('picture_announce');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);
            $str_min = $str . '_announce.jpg';
            $img_min = Image::make($file);
            $img_min->fit(436, 327)->save(public_path() . '/assets-landing/img/' . $str_min);
            $request['picture_announce_name'] = $str_min;
        }

        if ($request->hasFile('detailed_picture')) {
            $file = $request->file('detailed_picture');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);
            $str_max = $str . '_detailed.jpg';
            $img_max = Image::make($file);
            $img_max->fit(1140, 500)->save(public_path() . '/assets-landing/img/' . $str_max);
            $request['detailed_picture_name'] = $str_max;
        }

        // Сохранение в БД
        News::create([
            'headline' => $request['headline'],
            'alias' => $request['alias'],
            'desc_announce' => $request['desc_announce'],
            'picture_announce' => $request['picture_announce_name'],
            'detailed_desc' => $request['detailed_desc'],
            'detailed_picture' => $request['detailed_picture_name'],
            'created_at' => $request['created_at'],
        ]);

        return redirect()->route('news.index')->with('status', 'Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $code_access = serialize(['View_admin', 'View_content', 'Edit_content']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        return view('admin.content.news.edit', [
            'value' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {   
        $code_access = serialize(['View_admin', 'View_content', 'Edit_content']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        // Выполняем проверку данных полученных из $request
        $validator = $request->validate([
            'headline' => 'required|max:100',
            'alias' => 'required|max:100|unique:news,alias,' . $news->id,
            'desc_announce' => 'required|max:255',
            'detailed_desc' => 'required',
            'created_at' => 'required',               
        ]);

        // Обработка и сохранение изображений
        if ($request->hasFile('picture_announce')) {
            $file = $request->file('picture_announce');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);
            $str_min = $str . '_announce.jpg';
            $img_min = Image::make($file);
            $img_min->fit(436, 327)->save(public_path() . '/assets-landing/img/' . $str_min);
            $request['picture_announce_name'] = $str_min;
        } else {
            $request['picture_announce_name'] = $request['old_picture_announce'];
        }
        unset($request['old_picture_announce']);

        if ($request->hasFile('detailed_picture')) {
            $file = $request->file('detailed_picture');
            // Обработка изображения с помощью плагина intervention image
            $str = str_random(80);
            $str_max = $str . '_detailed.jpg';
            $img_max = Image::make($file);
            $img_max->fit(1140, 500)->save(public_path() . '/assets-landing/img/' . $str_max);
            $request['detailed_picture_name'] = $str_max;
        } else {
            $request['detailed_picture_name'] = $request['old_detailed_picture'];
        }
        unset($request['old_detailed_picture']);

        $news->headline = $request['headline'];
        $news->alias = $request['alias'];
        $news->desc_announce = $request['desc_announce'];
        $news->picture_announce = $request['picture_announce_name'];
        $news->detailed_desc = $request['detailed_desc'];
        $news->detailed_picture = $request['detailed_picture_name'];
        $news->created_at = $request['created_at'];
        $news->save();

        return redirect()->route('news.index')->with('status', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $code_access = serialize(['View_admin','View_content','Del_content']);
        if (Gate::denies('Access_check', $code_access)) {
            return redirect('/admin/content/services')
            ->with(['status-error' => 'У вас нет на это прав, обратитесь к администратору.']);
        }

        $news->delete();
        return redirect()->route('news.index')->with('status', 'Запись удалена');
    }
}
