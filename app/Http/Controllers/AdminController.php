<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\EloquentModelNotFoundException;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\User;
use Input;
use Mail;

class AdminController extends Controller
{
    protected $rules = [
        'username'  => ['required'],
        'phone'     => ['required', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
        'email'     => ['required', 'email', 'unique:users']
    ];

    protected $updateRules = [
        'username'  => ['required'],
        'phone'     => ['required', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
        'email'     => ['required', 'email']
    ];    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages/admin', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $input = Input::all();
        User::create($input);

        $sent = Mail::send('email/form', $input, function($message)
        {
            $message->from('mikalz5@gmail.com', 'Server');
            $message->to('michaelchunkitwong@gmail.com', 'Administrator')->subject('Notification: A new user has been added');
        });

        return redirect('/')->with('success', 'New user created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) {
            dd($e);
        }

        return view('pages/edit', compact('user'));
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
        $this->validate($request, $this->updateRules);

        try {
            $user = User::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) {
            dd($e);
        }
        
        $input = Input::except('_method', '_token');
        $user->update($request->all());

        return redirect('admin')->with('success', 'User updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin')->with('success', 'User deleted');;
    }
}
