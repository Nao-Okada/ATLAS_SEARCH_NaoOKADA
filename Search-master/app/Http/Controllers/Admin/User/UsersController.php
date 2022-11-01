<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Users\User;
use App\Models\Users\UserPersonCharge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use ILLuminate\support\Facades\DB;

class UsersController extends Controller
{
    //Users index
    public function index(){
        // get users all information
        $users = User::all();
        $teachers = User::select('id','username','role')->whereIn('role',[0,5])->get();

        return view('users.index', ['users' => $users, 'teachers' => $teachers]);
    }

    public function search(Request $request)
    {
        // items from request
        $condition = $request->input('condition');
        $order = $request->input('order');
        $ageFrom = $request->input('ageFrom');
        $ageTo = $request->input('ageTo');
        $admissionDateFrom = $request->input('admissionDateFrom');
        $admissionDateTo = $request->input('admissionDateTo');
        $math_teacher_user_id = $request->input('math_teacher_user_id');
        $japanese_language_user_id = $request->input('japanese_language_user_id');
        $role = $request->only(['roleOfJapaneseTeacher','roleOfMathTeacher','roleOfStudent']);
        $scoreFrom = $request->input('scoreFrom');
        $scoreTo = $request->input('scoreTo');
        $elderBirthday = Carbon::now()->subYear($ageFrom)->format('Y-m-d');
        $newestBirthday = Carbon::now()->subYear($ageTo + 1)->addDay()->format('Y-m-d');

        // get users info
        $query = User::query();

        $teachers = User::select('id','username','role')->whereIn('role',[0,5])->get();


        // condition with order -> completed!
        if ($condition==0) {
            if ($order==0) {
                $query->orderBy('username_kana','asc');
            }elseif ($order==1) {
                $query->orderBy('username_kana','desc');
            }
        }
        if ($condition==1) {
            if ($order==0) {
                $query->orderBy('birthday','desc');
            }elseif ($order==1) {
                $query->orderBy('birthday','asc');
            }
        }
        if ($condition==2) {
            if ($order==0) {
                $query->orderBy('birthday','asc');
            }elseif ($order==1) {
                $query->orderBy('birthday','desc');
            }
        }
        if ($condition==3) {
            if ($order==0) {
                $query->orderBy('admission_date','asc');
            }elseif ($order==1) {
                $query->orderBy('admission_date','desc');
            }
        }

        // condition with age -> completed!
        if (!empty($ageFrom)) {
            $query->where('birthday', '<=', $elderBirthday);
        }
        if (!empty($ageTo)) {
            $query->where('birthday', '>=', $newestBirthday);
        }

        // condition with admission date -> completed!
        if (!empty($admissionDateFrom)) {
            $query->where('admission_date', '>=', $admissionDateFrom);
        }
        if (!empty($admissionDateTo)) {
            $query->where('admission_date', '<=', $admissionDateTo);
        }

        // condition with charged teacher -> completed!
        if (!empty($math_teacher_user_id)) {
            $query->whereHas('mathTeacher', function($q) use ($math_teacher_user_id) {
                $q->where('math_teacher_user_id',$math_teacher_user_id);
            });
        }
        if (!empty($japanese_language_user_id)) {
            $query->whereHas('japaneseTeacher', function($q) use ($japanese_language_user_id) {
                $q->where('japanese_language_user_id', $japanese_language_user_id);
            });
        }

        // condition with role -> completed!
        if (!empty($role)) {
            $query->where('role',$role);
        }

        // condition with score
        if (!empty($scoreFrom)) {
            $query->whereHas('userScore', function($q) use ($scoreFrom) {
                $q->where('score', '>=', $scoreFrom);
            });
        }
        if (!empty($scoreTo)) {
            $query->whereHas('userScore', function($q) use ($scoreTo) {
                $q->where('score', '<=', $scoreTo);
            });
        }

        $users = $query->get();

        return view('users.index',['users' => $users, 'teachers' => $teachers]);
    }
}
