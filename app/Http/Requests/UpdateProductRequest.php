<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép thực hiện request này không.
     */
    public function authorize(): bool
    {
        return true; // Cho phép tất cả người dùng gửi request
    }

    /**
     * Định nghĩa rules (quy tắc xác thực).
     */
    public function rules(): array
    {
        if (request()->method() == "PUT") {
      
            return [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'unitPrice' => 'required|numeric|min:0',
                'promotionPrice' => 'numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'unit' => 'required|string|max:50',
                'new' => 'required|boolean'
            ];
        } else {
           
            return [
                'name' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'unitPrice' => 'sometimes|numeric|min:0',
                'promotionPrice' => 'sometimes|numeric|min:0',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
                'unit' => 'sometimes|string|max:50',
                'new' => 'sometimes|boolean'
            ];
        }
    }

    public function prepareForValidation() {
        $this->merge([
            'unit_price' => $this->unitPrice,
            'promotion_price' => $this->promotionPrice
        ]);
    }
}