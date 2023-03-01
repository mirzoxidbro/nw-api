<?php

namespace Modules\Core\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'string|required|max:255',
            'last_name' => 'string|required|max:255',
            'username' => 'required|max:150|unique:users,username',
            'password' => 'required|min:4',
            'position' =>  ['required', new Enum(UserType::class)],
            'phone' => 'nullable|max:15|regex:/^(998)[0-9]{9}$/',
            'birthday' => 'nullable|date_format:Y-m-d',
            'gender' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле "Имя" обязательно для заполнения',
            'first_name.max' => 'Поле "Имя" не должно превышать 255 символов',
            'last_name.required' => 'Поле "Фамилия" обязательно для заполнения',
            'last_name.max' => 'Поле "Фамилия" не должно превышать 255 символов',
            'username.required_if' => 'Поле "Логин" обязательно для заполнения',
            'username.unique' => 'Поле "Логин" должно быть уникальным',
            'username.max' => 'Поле "Логин" не должно превышать 150 символов',
            'type.required' => 'Поле "Тип" обязательно для заполнения',
            'password.required_if' => 'Поле "Пароль" обязательно для заполнения',
            'password.min' => 'Поле "Пароль" должно содержать минимум 8 символов',
            'phone.max' => 'Поле "Телефон" не должно превышать 15 символов',
            'phone.regex' => 'Поле "Телефон" должно соответствовать формату 998XXXXXXXXX',
            'birthday.date_format' => 'Поле "Дата рождения" должно соответствовать формату Y-m-d',
            'gender.boolean' => 'Поле "Пол" должно быть булевым значением',
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
