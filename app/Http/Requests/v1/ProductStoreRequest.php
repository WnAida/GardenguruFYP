<?php

namespace App\Http\Requests\v1;

use App\Enums\ProductCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class ProductStoreRequest extends FormRequest
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
            'name'=>  'required|string',
            'description'=>  'required|string',
            'quantity'=>  'required|numeric',
            'category'=> ['required', new EnumRule(ProductCategoryEnum::class)],
            'price'=>'required|numeric',
            'min_order_qty'=>'required|numeric',
            'photo_path' => 'nullable',
        ];
    }
}
