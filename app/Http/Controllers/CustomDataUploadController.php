<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomDataImport;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CustomDataUploadController extends Controller
{
    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');

        $filePath = $file->storeAs('temp', $file->getClientOriginalName(), 'local');

        $import = new CustomDataImport();
        $import->importCsv($filePath);  // Asegúrate de pasar $filePath como argumento aquí

        File::delete(storage_path('app/' . $filePath));

        return redirect()->back()->with('success', 'Datos importados exitosamente.');
    }
}
