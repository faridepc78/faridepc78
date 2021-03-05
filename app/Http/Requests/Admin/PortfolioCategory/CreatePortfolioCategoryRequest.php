<?php

namespace App\Http\Requests\Admin\PortfolioCategory;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolio_category,slug'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'نام دسته بندی نمونه کار',
            'slug' => 'اسلاگ دسته بندی نمونه کار'
        ];
    }
}
