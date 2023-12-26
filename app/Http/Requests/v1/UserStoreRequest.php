<?php

namespace App\Http\Requests\v1;
use App\Enums\UserExpertiseEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

            return [
                // 'user_id'=> 'required|numeric|exists:users,id',
                'name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string',
                'phone_number' => 'required|string',
                'address' => 'required|string',
                'expertise' => ['required', new EnumRule(UserExpertiseEnum::class)],
                'profile_photo_path' => ['required|string','nullable']
                // 'photo_path' => ['file|mimes:png,jpg,jpeg', 'max:1000', 'nullable'],
            ];
    }
}
