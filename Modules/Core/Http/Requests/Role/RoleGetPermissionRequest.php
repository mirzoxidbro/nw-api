<?php

namespace Modules\Core\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleGetPermissionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'permissionIds' => 'required|array'
        ];
    }

    public function messages(): array
    {
        return [
            'permissionIds.required' => "Permission ids required",
            'permissionIds.array' => "Permission ids must come in an array"
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
