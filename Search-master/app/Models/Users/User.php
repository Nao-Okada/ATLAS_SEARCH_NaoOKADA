<?php

namespace App\Models\Users;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Notifiable;
    use Sortable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'username_kana',
        'birthday',
        'admission_date',
        'gender',
        'email',
        'password',
        'role',
    ];

    // get age from birthday
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    // sort function
    public $sortable = ['username','age','birthday','admission_date'];

    public function japaneseTeacher() {
        return $this->belongsToMany('App\Models\Users\User','user_person_charges', 'user_id','japanese_language_user_id');
    }

    public function mathTeacher() {
        return $this->belongsToMany('App\Models\Users\User','user_person_charges', 'user_id','math_teacher_user_id');
    }

    // wether japanese student or not
    public function isJapaneseStudent(Int $user_id)
    {
        return (boolean) $this->japaneseTeacher()->where('user_id', $user_id)->exists();
    }

    // wether math student or not
    public function isMathStudent(Int $user_id)
    {
        return (boolean) $this->mathTeacher()->where('user_id', $user_id)->exists();
    }

    public function userScore() {
        return $this->hasOne('App\Models\Users\UserScore');
    }

}
