<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPost extends FormRequest
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
            'name'=>'required|min:2',
            'pwd'=>'required|min:6'
        ];
    }
    public function messages()
    {
        $message=[
            'name.min'=>'名字的字符最少:min字符',
            'pwd.required'=>'密码是必填的',
            'pwd.min'=>'密码的字符最少:min字符'
        ];
        return $message;
    }
    public function attributes()
    {
        $attr=[
            'name'=>'名字',
            'pwd'=>'密码'
        ];
        return $attr;
    }
}
