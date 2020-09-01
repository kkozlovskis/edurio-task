<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class CsvService
{
    public static function streamFileFromModel(array $columns, Model $model): void
    {
        $handle = fopen('php://output', 'w');
        fwrite($handle, (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        fputcsv($handle, $columns);

        $model::chunk(1000, function ($collection) use ($handle, $columns) {
            foreach ($collection as $modelData) {
                fputcsv($handle, $modelData->only($columns));
            }
        });

        fclose($handle);
    }
}
