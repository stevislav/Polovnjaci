<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Rmbr_search;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'username' => ['required'],
            'city' => ['required'],
            'birthday' => ['required'],
            'surname' => ['required'],
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'image' => '',
            'car_image' => ''

        ]);


        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/profile');

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
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {   
        
        User::whereId(auth()->user()->id)->delete();
        return redirect('/');
    }


    public function login(Request $request, User $user)
    {

        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'

        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if (auth()->user()->is_admin) {
                return redirect("/admin/index");
            } else {
                return redirect("/profile");
            }
        }

        return back();

    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function update_password(Request $request)
    {

        $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
        ]);

        if (!Hash::check($request->password, auth()->user()->password)) {
            return back();
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return back();

    }

    public function admin_users(){
        if (auth()->user()->is_admin) {
            return view('admin_users', ['users' => User::all()]);
        }
        return back();
    }

    public function delete_user($id) {
        if (auth()->user()->is_admin) {
            Listing::where('user_id', $id)->delete();
            Rmbr_search::where('user_id', $id)->delete();
            User::whereId($id)->delete();
        }
        return back();
    }

    public function change_profile(Request $request) {
        $request->validate([
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $image->move(public_path().'/storage/profileImages/', $img = 'img_'.Str::random(15).'.jpg');
        
        User::whereId(auth()->user()->id)->update([
            'image' => $img
        ]);

        return back();
    }

    public function change_car_image(Request $request) {
        $request->validate([
            'car_image' => 'required|image',
        ]);

        $image = $request->file('car_image');
        $image->move(public_path().'/storage/car_images/', $img = 'img_'.Str::random(15).'.jpg');
        
        User::whereId(auth()->user()->id)->update([
            'car_image' => $img
        ]);

        return back();
    }
}