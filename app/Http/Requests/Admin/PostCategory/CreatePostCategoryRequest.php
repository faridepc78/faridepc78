<?php

namespace App\Http\Requests\Admin\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:post_category,slug'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی پست',
            'slug' => 'اسلاگ دسته بندی پست',
            'image' => 'تصویر دسته بندی پست'
        ];
    }
}
