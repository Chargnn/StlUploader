<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function StlModels(): HasMany
    {
        return $this->hasMany(StlModel::class);
    }
}
