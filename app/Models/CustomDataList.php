<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDataList extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function columns()
    {
        return $this->hasMany(CustomDataColumn::class);
    }

    public function rows()
    {
        return $this->hasMany(CustomDataRow::class);
    }
}
