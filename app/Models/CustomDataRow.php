<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDataRow extends Model
{
    use HasFactory;

    protected $fillable = ['list_id', 'column_id', 'fila', 'value'];

    public function customDataList()
    {
        return $this->belongsTo(CustomDataList::class, 'list_id');
    }

    public function customDataColumn()
    {
        return $this->belongsTo(CustomDataColumn::class, 'column_id');
    }
}
