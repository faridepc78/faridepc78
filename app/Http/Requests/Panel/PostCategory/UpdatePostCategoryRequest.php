<?php

namespace App\Http\Requests\Panel\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:expertise,slug,'.request()->route('post_category'),
            'image' => 'mimes:jpg,png,jpeg|max:1024'
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
