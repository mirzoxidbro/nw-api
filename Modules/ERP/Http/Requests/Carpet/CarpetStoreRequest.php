<?php

namespace Modules\ERP\Http\Requests\Carpet;

use Illuminate\Foundation\Http\FormRequest;

class CarpetStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->request);
        return [
            'order_id' => 'required|integer',
            'longtitute' => 'required|numeric',
            'latitute' => 'required|numeric',
            'type' => 'required|in:thin,ordinary,special',
            'status' => 'nullable|in:was_brought,washed,prepared',
            'info' => 'nullable|string'
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
