<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialiteUpdateRequest extends FormRequest
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
            'github_client_id' => 'required|string|min:3|max:255',
            'github_secret' => 'required|string|min:3|max:255',
            'github_callback_url' => 'required|string|min:3|max:255',

            'google_client_id' => 'required|string|min:3|max:255',
            'google_secret' => 'required|string|min:3|max:255',
            'google_callback_url' => 'required|string|min:3|max:255',
        ];
    }
}
