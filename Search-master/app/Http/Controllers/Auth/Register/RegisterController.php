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
            'username' => $data['last'].''.$data['first'],
            'username_kana' => $data['last_kana'].''.$data['first_kana'],
            'birthday' => date_format($data['birth_year'].''.$data['birth_month'].''.$data['birth_day'], 'Y-m-d'),
            'admission_date' => date_format($data['admission_year'].''.$data['admission_month'].''.$data['admission_date'], 'Y-m-d'),
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request){

        if($request->isMethod('post')){

            $request->validate([
                'last' => 'required|string|max:15|min:1',
                'first' => 'required|string|max:15|min:1',
                'last_kana' => 'required|string|/\A[ァ-ヶー]+\z/u|max:30|min:1',
                'first_kana' => 'required|string|/\A[ァ-ヶー]+\z/u|max:30|min:1',
                'birthday' => 'required|date_format:d/m/Y',
                'admission_date' => 'required|date_format:d/m/Y',
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
