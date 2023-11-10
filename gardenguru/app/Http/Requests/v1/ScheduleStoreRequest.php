<?php

namespace App\Http\Requests\v1;

use App\Enums\ScheduleStageEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class ScheduleStoreRequest extends FormRequest
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
            'location' => 'required|string',
            'planted_at' => 'required|string',
            'notes' => 'required|string',
            'stage' => ['required', new EnumRule(ScheduleStageEnum::class)],
            'seed' => 'required|numeric',
            'photo_path' => ['file|mimes:png,jpg,jpeg', 'max:1000', 'nullable'],
        ];
    }
}
