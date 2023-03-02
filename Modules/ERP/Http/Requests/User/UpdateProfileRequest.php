<?php

namespace Modules\ERP\Http\Requests\User;

use Modules\ERP\Enum\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'nullable|max:255',
            'last_name' => 'nullable|max:255',
            'username' => 'max:150|unique:users,username,',
            'password' => 'required|min:8',
            'position' =>  ['required', new Enum(UserType::class)],
            'phone' => 'nullable|max:15|regex:/^(998)[0-9]{9}$/',
            'birthday' => 'nullable|date_format:Y-m-d',
            'gender' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.max' => 'Имя не должно превышать 255 символов',
            'last_name.max' => 'Фамилия не должна превышать 255 символов',
            'username.required_if' => 'Логин обязателен',
            'username.unique' => 'Логин должен быть уникальным',
            'username.max' => 'Логин не должен превышать 150 символов',
            'password.required_if' => 'Пароль обязателен',
            'password.min' => 'Пароль должен быть не менее 8 символов',
            'phone.max' => 'Номер телефона не должен превышать 15 символов',
            'phone.regex' => 'Номер телефона должен соответствовать формату 998XXXXXXXXX',
            'birthday.date_format' => 'Дата рождения должна соответствовать формату Y-m-d',
            'gender.boolean' => 'Пол должен быть булевым значением',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
