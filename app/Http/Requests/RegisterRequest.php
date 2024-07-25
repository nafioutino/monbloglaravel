<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|string|max:255",
            "email"=>"required|string|lowercase|email|max:255|unique:users",
            "password"=>[
                "required",
                "confirmed",
                Password::default(), // equivaut min(8)
                ]
        ];
    }


    // une fonction qui s'execute après la validation des données
    // protected function passedValition(){
    //     $this->merge(["password", bcrypt( $this->password )]);
    // }


    // public function after():array{
    //     return [
    //         function(Validator $validator){
    //             if (!$validator->fails()) {
                        //Encrypte le mot de passe
    //                 $this->merge([
    //                     'password'=>bcrypt($this->password)
    //                 ]);
    //             }
    //         }
    //     ];
    // }
}
