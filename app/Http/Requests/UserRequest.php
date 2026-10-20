<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('superadmin') ?? false;
    }

    public function rules(): array
    {
        $userId = $this->route('user');
        $creating = $this->routeIs('pengguna.store');

        return [
            'name' => ['required', 'string', 'max:300'],
            'username' => ['required', 'string', 'max:300', Rule::unique('users', 'username')->ignore($userId)],
            'email' => ['required', 'email', 'max:300', Rule::unique('users', 'email')->ignore($userId)],
            'nomor_hp' => ['required', 'string', 'max:300', Rule::unique('users', 'nomor_hp')->ignore($userId)],
            'password' => [$creating ? 'required' : 'nullable', 'string', 'max:300'],
            'default_role' => ['required', 'string', Rule::exists('roles', 'name')],
            'foto' => [$creating ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:1024'],
        ];
    }
}
