<?php

namespace App\Http\Controllers;

use App\File;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->full_name = $request['fullName'];
        $ticket->address = $request['address'];
        $ticket->phone = $request['phone'];
        $ticket->email = $request['email'];
        $ticket->supervision = $request['supervision'];
        $ticket->case_number = $request['caseNumber'];
        $ticket->authority = $request['authority'];
        $ticket->agree = $request['agree'];
        $ticket->action = $request['action'];
        $ticket->solve = $request['solve'];
        $ticket->save();

        return redirect()->back()->with(['message' => 'Данные отправлены!', 'alert' => 'alert-success']);
        /*dd($request->file('file')->getClientMimeType());*/
       /* $validateData = $request->validate([
            'fullName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:11',
            'email' => 'required|email',
            'supervision' => 'required|string|max:255',
            'authority' => 'required|string|max:255',
            'agree' => 'required',
            'action' => 'required',
            'solve' => 'required',
            'file' => 'required|file|max:10000|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessing',
        ]);

        dd($validateData);*/
        /*$ticket = new Ticket();
        $ticket->full_name = $request['fullName'];
        $ticket->address = 'test';
        $ticket->phone = 'test';
        $ticket->email = 'test';
        $ticket->supervision = 'test';
        $ticket->case_number = 'test';
        $ticket->authority = 'test';
        $ticket->agree = 'test';
        $ticket->action = 'test';
        $ticket->solve = 'test';
        $ticket->save();

        if ($request['file']){
            $file = new File();
            $file->title = $request->file('file')->getClientOriginalName();
            $file->uuid = '125';
            $file->ticket()->associate($ticket);
            $request->file('file')->storeAs('files', $file->title);
            $file->save();
        }*/

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
