<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhoneRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'manufacturer' => ['required', 'string', 'max:255'],
            'release_date' => ['required', 'date'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'image.image' => 'File không phải là hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg hoặc png',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2048KB',
            'manufacturer.required' => 'Nhà sản xuất không được để trống',
            'manufacturer.max' => 'Nhà sản xuất không được vượt quá 255 ký tự',
            'release_date.required' => 'Ngày phát hành không được để trống',
            'release_date.date' => 'Ngày phát hành không hợp lệ',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là một số',
            'price.min' => 'Giá không được nhỏ hơn 0',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.integer' => 'Số lượng phải là một số nguyên',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0',
            'category_id.required' => 'Danh mục không được để trống',
            'category_id.exists' => 'Danh mục không hợp lệ',
        ];
    }
}
