<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'name_en', 'sort_order'])]
class CategoryGroup extends Model
{
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class)->orderBy('sort_order');
    }

    public function label(): string
    {
        return app()->getLocale() === 'en' && $this->name_en
            ? $this->name_en
            : $this->name;
    }
}
