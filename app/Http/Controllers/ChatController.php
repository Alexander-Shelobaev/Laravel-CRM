<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Gate;
use App\User;
use Auth;
use DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Проверка права пользователя на доступ к разделу. Первый аргумент это название действия, второй название/я доступа/ов которое мы передаем в AuthServiceProvider
        $code_access = serialize(['View_admin']);
        if (Gate::denies('Access_check',$code_access)) { // метод denies() возвращает true, если пользователю запрещено действие указанное в скобках
            return redirect('/admin/user-management/roles')->with(['status-error'=>'У вас нет на это прав, обратитесь к администратору.']);
        }

        // массив из id, имени пользователя и количества непрочитанных сообщений
        // непрочитанные сообщения подсчитываются для текущего авторизированного пользователя
        $author_id = Auth::user()->id;
        $users = User::all();

        $arr_users = array();
        foreach ($users as $key => $value) {
            $arr_users[] = ['id'=>$value->id,'name'=>$value->name,'avatar'=>$value->avatar,'count'=>count(User::find($author_id)->chatMessages
                                                                                                        ->where('author_id','=',$value->id)
                                                                                                        ->where('view','=',false))];
        }

        return view('admin.chat.index', [
            'arr_users' => $arr_users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Chat $chat,Request $request)
    {
        $validator = $request->validate([
            'message'=>'required|max:255',
            'recipient_id'=>'required',
        ]);

        $chat->text = $request['message'];
        $chat->author_id = Auth::user()->id;
        $chat->recipient_id = $request['recipient_id'];
        $chat->view = false;

        $chat->save();

        return redirect()->route('chat.show',$request['recipient_id'])->with('status','Запись обновлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author_id = Auth::user()->id;
        $users = User::all();

        $arr_users = array();
        foreach ($users as $key => $value) {
            $arr_users[] = ['id'=>$value->id,'name'=>$value->name,'avatar'=>$value->avatar,'count'=>count(User::find($author_id)->chatMessages
                                                                                                        ->where('author_id','=',$value->id)
                                                                                                        ->where('view','=',false))];
        }


        $recipient_id = User::find($id)->id;
        $messages = Chat::where('author_id', '=', $author_id)
                        ->where('recipient_id', '=', $recipient_id)
                        ->where('author_id', '=', $recipient_id, 'or')
                        ->where('recipient_id', '=', $author_id)
                        ->get();

        foreach ($messages as $key => $value) {
            if ($author_id == $value->recipient_id and $value->view == false) {
                $value->view = true;
                $value->save();
            }
        }


        return view('admin.chat.show', [
            'arr_users' => $arr_users,
            'recipient_id' => $recipient_id,
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
