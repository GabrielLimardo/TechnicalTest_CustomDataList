<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDataRow extends Model
{
    use HasFactory;

    protected $fillable = ['list_id', 'column_id', 'value'];

    public function list()
    {
        return $this->belongsTo(CustomDataList::class);
    }

    public function column()
    {
        return $this->belongsTo(CustomDataColumn::class);
    }
}
