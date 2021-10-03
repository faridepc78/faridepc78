<?php

namespace App\Http\Requests\Admin\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('post_category');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:post_category,slug,' . $id],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024']
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
