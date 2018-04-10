<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePersonRequest extends FormRequest
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
             'name'             => 'required',
             'surname'          => 'required',
             'id_number'        => 'required|min:13|max:13|unique:users,id_number',
             'mobile_number'    => 'required|min:10|max:10|unique:users,mobile_number',
             'language_id'      => 'required|not_in:0',

        ];
    }
}
