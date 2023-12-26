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

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                foreach ($headers as $index => $header) {
                    $column = CustomDataColumn::firstOrCreate([
                        'list_id' => $list->id,
                        'name' => $header,
                        'data_type' => 'string',
                    ]);

                    CustomDataRow::create([
                        'list_id' => $list->id,
                        'column_id' => $column->id,
                        'value' => $data[$index],
                    ]);
                }
            }
            fclose($handle);
        }
    }
}
