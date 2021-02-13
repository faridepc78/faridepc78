<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:post,slug,'.request()->route('post'),
            'post_category_id'=>'required|exists:post_category,id',
            'image' => 'mimes:jpg,png,jpeg|max:1024',
            'text' => 'required'
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
