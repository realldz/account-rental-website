<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        // dd($this);
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|min:8',
            'status' => 'required|boolean',
            'is_admin' => 'required|boolean',
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
