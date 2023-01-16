<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:15', 'min:3'],
            'phone' => ['required', 'string', 'max:11'],
            'email' => ['required', 'email:rfc,dns', 'unique:App\Models\User,email'],


        ];
    }

    public function failedValidation(Validator $validator): void
    {
       throw new HttpResponseException(response()->json([
           'success' => false,
           'message' => 'Validation errors',
           'data' => $validator->errors()
       ]));
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле name обязательное для заполнения',
            'name.string' => 'Поле name должно быть строкой',
            'name.max' => 'Поле name слишком длинное',
            'name.min' => 'Слишком мало сиволов в имени',

            'phone.required' => 'Поле phone обязательное для заполнения',
            'phone.string' => 'Поле phone должно быть строкой',


            'email.required' => 'Поле email обязательное для заполнения',
            'email.fnc' => 'Поле email должно быть почтой',
            'email.dns' => 'Поле email должно быть почтой',
            'email.unique' => 'Так поле уже есть в бд',
        ];
    }
}
