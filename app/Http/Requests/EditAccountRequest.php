<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|current_password',
            'new_password' => 'nullable|string|min:8|confirmed',
        ];
    }
    public function validated()
    {
        $validated = parent::validated();

        // Xóa password khỏi mảng nếu password không được nhập
        if (is_null($validated['password'])) {
            unset($validated['password']);
        }

        return $validated;
    }
}
