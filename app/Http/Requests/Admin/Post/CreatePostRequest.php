<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post,slug',
            'post_category_id' => 'required|numeric|exists:post_category,id',
            'image' => 'required|mimes:jpg,png,jpeg|max:1024',
            'text' => 'required|string'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'نام پست',
            'slug' => 'اسلاگ پست',
            'post_category_id' => 'دسته بندی پست',
            'image' => 'تصویر پست',
            'text' => 'توضیحات پست'
        ];
    }
}
