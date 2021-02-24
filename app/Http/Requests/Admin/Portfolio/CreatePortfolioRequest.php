<?php

namespace App\Http\Requests\Admin\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'headline' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolio,slug',
            'portfolio_category_id'=>'required|numeric|exists:portfolio_category,id',
            'image' => 'required|mimes:jpg,png,jpeg|max:1024',
            'text' => 'required|string',
            'customer' => 'required|string|max:255',
            'start_date' => 'required|date|date_format:Y-m-d|before:end_date',
            'end_date' => 'required|date|date_format:Y-m-d|after:start_date'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام نمونه کار',
            'headline' => 'تیتر نمونه کار',
            'slug' => 'اسلاگ نمونه کار',
            'portfolio_category_id'=>'دسته بندی نمونه کار',
            'image' => 'تصویر نمونه کار',
            'text' => 'توضیحات نمونه کار',
            'customer' => 'مشتری نمونه کار',
            'start_date' => 'تاریخ شروع نمونه کار',
            'end_date' => 'تاریخ پایان نمونه کار'
        ];
    }
}
