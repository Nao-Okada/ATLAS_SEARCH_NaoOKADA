<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Users\User;
use App\Models\Users\UserPersonCharge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use DB;

class RegisterController extends Controller
{

    public function register(Request $request){

        $user = User::get();

        if($request->isMethod('post')){

            $request->validate([
                'last' => 'required|string|max:15|min:1',
                'first' => 'required|string|max:15|min:1',
                'last_kana' => 'required|string|katakana|max:30|min:1',
                'first_kana' => 'required|string|katakana|max:30|min:1',
                'birth_year' => 'required_with:birth_month,birth_day',
                'birth_month' => 'required_with:birth_year,birth_day',
                'birth_day' => 'required_with:birth_year,birth_month',
                'admission_year' => 'required_with:admission_month,admission_date',
                'admission_month' => 'required_with:admission_year,admission_date',
                'admission_date' => 'required_with:admission_year,admission_month',
                'gender' => 'required',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|max:30|min:8|unique:users|regex:/\A([a-zA-Z0-9]{8,})+\z/u|confirmed',
            ]);

            $data = $request->input();

            $birthDay = $data['birth_year'].'-'.$data['birth_month'].'-'.$data['birth_day'];
            $admissionDate = $data['admission_year'].'-'.$data['admission_month'].'-'.$data['admission_date'];

            $birth_date = date('Y-m-d',strtotime($birthDay));
            $admission_date = date('Y-m-d',strtotime($admissionDate));

            User::create([
            'username' => $data['last'].''.$data['first'],
            'username_kana' => $data['last_kana'].''.$data['first_kana'],
            'birthday' => $birth_date,
            'admission_date' => $admission_date,
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            ]);

            $id = DB::getPdo()->lastInsertId();

            if (!empty($data['japanese_language_user_id'])) {
                UserPersonCharge::create([
                    'user_id' => $id,
                    'japanese_language_user_id' => $data['japanese_language_user_id'],
                ]);
            }

            if (!empty($data['math_teacher_user_id'])) {
                UserPersonCharge::create([
                    'user_id' => $id,
                    'math_teacher_user_id' => $data['math_teacher_user_id'],
                ]);
            }

            return redirect('added');

        } else {
            return view('auth.register',['user' => $user]);
        }

    }

    public function added(){
        return view('auth.added');
    }
}
