<?php

namespace App\Util;

use App\Interfaces\ReportFile;
use PDF;

class PdfReportFile implements ReportFile {
    public function download($name, $data) {
        $pdf = PDF::loadView('userspace.orders.pdf', $data);
        return $pdf->download($name . '.pdf');
    }
}
