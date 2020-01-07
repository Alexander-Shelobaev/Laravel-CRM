<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Portfolio;
use App\News;
use App\Currencies;
use App\States;
use App\Cities;
use App\Airplaces;
use Mail;
use Validator;
use Image;
use Gate;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return redirect('/admin');
    }

    
    public function admin()
    {
        // Проверка на присутствие шаблона
        if (view()->exists('/admin.admin-home')) {
            $data = ['title' => 'Панель администратора'];
            return view('/admin.admin-home', compact('data'));
        }
        echo "Ошибка: не найден шаблон";
    }


}
