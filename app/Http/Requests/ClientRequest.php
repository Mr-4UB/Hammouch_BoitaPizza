<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'
            'Nom' => 'string|required|min:5|max:50',
            'Prenom' => 'string|required|min:5|max:50',
            'Email' => 'required|email',
            'Adresse' => 'required|min:5|max:255',
            'login' => 'required|min:5|max:100',
            'MotdePasse' => 'string|required|alpha_num|min:8',
            'Date_inscription' => 'required',
            'imgPath' => 'required',

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
