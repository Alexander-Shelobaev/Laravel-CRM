<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

// Доступ к моделям
use App\Service;
use App\Portfolio;
use App\News;

use Mail;
use Validator;

//////////////////////////////////////// Пользовательска часть ////////////////////////////////////////
class LandingController extends Controller
{	
	public function Landing(Request $request){
		// Обработчик формы обратной связи
		if($request->isMethod('post')){
			// Тексты сообщений при не успешном заполнении формы 
			$messages = ['required'=>"Поле :attribute обязательно к заполнению",'email'=>"Поле :attribute должно соответствовать email адресу"];
			// Проверка валидации
			$this->validate($request,['name'=>'required|max:255','email'=>'required|email','text'=>'required'], $messages);
			dd($request);
			$data = $request->all();
			$result = Mail::send('laravel-level1.email',['data'=>$data], function($message) use ($data){
				$mail_admin = env('MAIL_ADMIN');
				$message->from($data['email'], $data['name']);
				$message->to($mail_admin)->subject('Question');
			});
			if($result){return redirect()->route('landingHome')->with('status','Сообщение отправлено');}
		}

		// Выбока данных из БД для отображения на главной странице
		$services = Service::all();
		$portfolios = Portfolio::get(array('title', 'short_text', 'href', 'img'));
		//$news = News::all(); // Получаем все данные из БД
		$news = News::paginate(6); // Получаем данные из БД по 6
		return view('/landing/landing', compact('services','portfolios','news'));
	}

	public function LandingServices($alias){
		$service = Service::where('alias','=',$alias)->first();
		return view('/landing/service', compact('service'));
	}

	public function LandingNews($alias){
		//$news = News::find(1); // поиск по id
		$news = News::where('alias','=',$alias)->first(); // поиск по alias
		$date = date('d.m.Y', strtotime($news->created_at));
		return view('/landing/news', compact('news','date'));
	}
}
?>
