<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:5',
            'age' => 'numeric|max:70',
            'gender' => 'required',
            'email' => 'required|unique:users|email|max:255',

        ]);
        $user = new User;
        $user->name = $req->name;
        $user->age = $req->age;
        $user->gender = $req->gender;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->ready_to_work = $req->ready;
        $user->save();
        $req->session()->put('user',$user);
        return redirect("view");
    }

    public function view()
    {
        $userId = Session::get('user')['id'];
        $user = User::find($userId);
        if($user)
        {   
            return view('view',['user'=>$user]);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit',['user'=>$user]);
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required|min:5',
            'age' => 'numeric|max:70',
            'gender' => 'required',
            'email' => 'required|email|max:255',
        ]);
        $user = User::find($id);
        $user->name = $req->name;
        $user->age = $req->age;
        $user->gender = $req->gender;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->ready_to_work = $req->ready;
        $user->save();
        return '<script>
                    alert("Details Updated!!"); 
                    window.location.href="/view";
                </script>';
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect("/");
    }
}
