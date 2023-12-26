<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomDataRow;
use App\Models\CustomDataColumn;
use App\Models\CustomDataList;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $listName = $request->input('list_name');
        $columnName = $request->input('column_name');
        $searchTerm = $request->input('search_term');
        $searchType = $request->input('search_type', 'contains');
        $filaNumber = $request->input('fila_number');

        $id_list = CustomDataList::where('name',$listName)->first()->id;
        $id_column = CustomDataColumn::where('name',$columnName)->first()->id;
        $fila = CustomDataRow::where('list_id',$id_list)->where('column_id',$id_column)->first()->fila;
        $results = CustomDataRow::where('fila',$fila)->where('list_id',$id_list)->get();

        return view('search.results', compact('results'));
    }

}
