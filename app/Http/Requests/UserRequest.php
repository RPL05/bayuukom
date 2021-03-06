<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'          => 'required',
            'email'         => 'required',
            'alamat'        => 'required',
            'no_handphone'  => 'required',
            'password'      => 'required',
        ];
    }
    public function formAnggota()
    {
        return [
            'name'          => $this->name,
            'email'         => $this->email,
            'no_handphone'  => $this->no_handphone,
            'alamat'        => $this->alamat,
        ];
    }
}
