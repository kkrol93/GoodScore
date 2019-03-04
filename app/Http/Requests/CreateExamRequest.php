<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateExamRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required',
            'ans1' => 'required',
            'ans2' => 'required',
            'ans3' => 'required',
            'ans4' => 'required',
            'cans' => 'required',
            
        ];
    }
}
