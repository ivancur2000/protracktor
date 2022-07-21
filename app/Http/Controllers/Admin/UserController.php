<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordGenerate;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['can:Show users']);
    }
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $roles = Role::all();
        return view('user.create', compact('roles', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=> 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users',
        'phone_number' => 'required',
        'team_id' => $request->role == 2 ? 'required' : '', 
        'role' => 'required'
      ]);
      
      $password = Str::random(8);

      $user = User::create([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'email_verified_at' => Carbon::now(),
        'phone_number' => $request->phone_number,
        'state_acount' => 0,
        'team_id' => $request->role != 2 ? null : $request->team_id,
        'password' => bcrypt($password),
      ]);
      
      $user->assignRole($request->role);

      Mail::to([$user->email])->send(new PasswordGenerate($user, $password));

      return redirect()->route('user.index');

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
      $roles = Role::all();
      $teams = Team::all();
      return view('user.edit', compact('user', 'roles', 'teams'));
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
      $request->validate([
        'name'=> 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'team_id' => $request->role == 2 ? 'required' : '', 
        'role' => 'required'
      ]);

      $user = User::find($id);
      $user->update([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'email_verified_at' => now(),
        'phone_number' => $request->phone_number,
        'team_id' => $request->role != 2 ? null : $request->team_id,
        'state_acount' => $request->status_acount,
      ]);
      
      $user->syncRoles([$request->role]);
      return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
