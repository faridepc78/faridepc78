<?php

namespace App\Http\Requests\Admin\PortfolioCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolio_category,slug,'.request()->route('portfolio_category')
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی نمونه کار',
            'slug' => 'اسلاگ دسته بندی نمونه کار'
        ];
    }
}