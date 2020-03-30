<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_admin){
            $tickets = Ticket::all();
        }else{
            $tickets = Auth::user()->tickets;

        }
        return view('tickets', ['tickets' => $tickets]);
    }

    public function show($id)
    {
        $statuses = ['На рассмотрении', 'На доработке', 'На подписании', 'Выполнено'];

        $ticket = Ticket::find($id);
        $users = User::where('is_admin', false)->get();
        $is_admin = Auth::user()->is_admin;

        return view('ticket-show', ['ticket' => $ticket, 'users' => $users, 'is_admin' => $is_admin, 'statuses' => $statuses]);
    }

    public function setOperator(Request $request, $id){
        $ticket = Ticket::find($id);

        $data = null;
        $message = '';

        if ($request->has('user')){
            $data = $request['user'];

            if ($data == 0){
                $ticket->user_id = null;
            }else{
                $ticket->user_id =$data;
            }
            $message = 'Оператор назначен!';
        }else{
            $data = $request['stat'];
            $ticket->status = $data;
            $message = 'Статус изменен!';
        }

        $ticket->save();

        return redirect('tickets')->with(['message' => $message, 'alert' => 'alert-success']);
    }

    public function download($uuid)
    {
        $file = File::where('uuid',$uuid)->firstOrFail();
        return Storage::download('/files/'.$file->title);
    }
}
