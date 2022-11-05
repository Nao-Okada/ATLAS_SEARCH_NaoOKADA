<?php

namespace App\Validation;

use Illuminate\Support\Facades\Validator;

class RuleValidator{
    public function validateKatakana($attribute, $value, $parameters){
        if (mb_ereg('^[ァ-ヶー]+$]', $value)) {
            return true;
        }
        return false;
    }
}
