<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('is_admin', false)->get();
        return view('operators',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('operator-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'login' => 'required|string|unique:users|max:5',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validatedData){
            $user = new User();
            $user->last_name = $request['lastName'];
            $user->first_name = $request['firstName'];
            $user->mid_name = $request['midName'];
            $user->login = $request['login'];
            $user->password = Hash::make($request['password']);
            $user->save();

            return redirect('operators')->with(['message' => 'Оператор добавлен!', 'alert' => 'alert-success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('operator-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'login' => 'required|string|max:5|unique:users,login,'.$id,
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validatedData) {
            $user = User::find($id);
            $user->last_name = $request['lastName'];
            $user->first_name = $request['firstName'];
            $user->mid_name = $request['midName'];
            $user->login = $request['login'];
            $user->password = Hash::make($request['password']);
            $user->save();

            return redirect('operators')->with(['message' => 'Данные оператора обнавлены!', 'alert' => 'alert-success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $tickets = Ticket::where('user_id', $request['id'])->get();

        foreach ($tickets as $ticket){
            $ticket->user_id = null;
            $ticket->save();
        }

        $user = User::find($request['id']);

        $user->delete();

        $request->session()->flash('message', 'Оператор удален!');
        $request->session()->flash('alert', 'alert-success');

        return response()->json(true);
    }
}
