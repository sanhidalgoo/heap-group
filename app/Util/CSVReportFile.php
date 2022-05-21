<?php

namespace App\Util;

use App\Interfaces\ReportFile;
use SoapBox\Formatter\Formatter;

class CSVReportFile implements ReportFile {
    public function download($name, $data) {
        //Serializer
        $data = $data["orderItems"];

        $formatter = Formatter::make($data->toArray(), Formatter::ARR);
        $csv = $formatter->toCsv();

        // create csv file in Storage
        $path = storage_path('app/public/' . $name . '.csv');
        $file = fopen($path, 'x');
        fwrite($file, $csv);
        fclose($file);

        // Sending and deleting the file
        return response()->download($path)->deleteFileAfterSend();
    }
}
