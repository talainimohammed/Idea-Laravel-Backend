<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        return $user !=null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->getMethod();
        if ($method === 'PATCH') {
            return [
                'title' =>['sometimes', 'string', 'max:255'],
                'description' => ['sometimes', 'string'],
                'category' => ['sometimes', 'string', 'max:255'],
                'valid' => ['sometimes', 'string'],
            ];
        }
    }
}
