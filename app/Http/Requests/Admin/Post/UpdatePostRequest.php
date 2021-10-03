<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('post');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:post,slug'],
            'post_category_id' => ['required', 'exists:post_category,id'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024'],
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
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
