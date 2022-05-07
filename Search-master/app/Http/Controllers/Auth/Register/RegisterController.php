<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;

class RegisterController extends Controller
{
    protected function create(array $data)
    {
        return User::create([
            'last'.'first' => $data['username'],
            'last_kana'.'first_kana' => $data['username_kana'],
            'birth_year'.'birth_month'.'birth_date' => $date['birthday'],
            'admission_year'.'admission_month'.'admission_date' => $date['admission_date'],
            'gender' => $date['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request){

        if($request->isMethod('post')){

            $request->validate([
                'username' => 'required|string|max:30|min:1',
                'username_kana' => 'required|string|/\A[ァ-ヶー]+\z/u|max:30|min:1',
                'birthday' => 'required',
                'admission_date' => 'required',
                'gender' => 'required',
                 'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|max:30|min:8|unique:users|confirmed',
            ]);

            $data = $request->input();

            $this->create($data);
            $request->session()->put('registered', $data['username']);
            return redirect('added');

        } else {
            return view('auth.register');
        }

    }

    public function added(){
        return view('auth.added');
    }
}
