<?php

namespace App\Imports;

use App\Models\CustomDataList;
use App\Models\CustomDataColumn;
use App\Models\CustomDataRow;

class CustomDataImport
{
    public function importCsv($filePath)
    {
        if (($handle = fopen(storage_path('app/' . $filePath), 'r')) !== FALSE) {
            $headers = fgetcsv($handle, 1000, ',');

            $fileName = pathinfo($filePath, PATHINFO_FILENAME);
            $list = CustomDataList::create([
                'name' =>  $fileName,
            ]);
            $fila = 0;
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $fila++;
                foreach ($headers as $index => $header) {
                    $column = CustomDataColumn::firstOrCreate([
                        'list_id' => $list->id,
                        'name' => $header
                    ]);

                    CustomDataRow::create([
                        'list_id' => $list->id,
                        'column_id' => $column->id,
                        'fila' => $fila,
                        'value' => $data[$index],
                    ]);
                }
            }
            fclose($handle);
        }
    }
}
