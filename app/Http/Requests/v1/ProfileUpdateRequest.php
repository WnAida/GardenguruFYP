<?php

namespace App\Http\Requests\v1;

use App\Enums\RegistrationStatusEnum;
use App\Enums\UserExpertiseEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class ProfileUpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'phone_number'=>'required|string',
            'address'=>'required|string',
            // 'profile_photo_path'=>'required|string',
            'expertise'=>['required', new EnumRule(UserExpertiseEnum::class)],
            'registration_status'=>['required', new EnumRule(RegistrationStatusEnum::class)],
        ];
    }
}
