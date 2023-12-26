<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDataColumn extends Model
{
    use HasFactory;

    protected $fillable = ['list_id', 'name'];

    public function list()
    {
        return $this->belongsTo(CustomDataList::class);
    }

    public function rows()
    {
        return $this->hasMany(CustomDataRow::class);
    }
}
