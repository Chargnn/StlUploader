<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    public function stlModels(): HasMany
    {
        return $this->hasMany(StlModel::class);
    }
}
