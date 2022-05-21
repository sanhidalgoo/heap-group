<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ReportFile;
use App\Util\CSVReportFile;
use App\Util\PdfReportFile;

class ReportFileServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ReportFile::class, function ($app, $params) {
            $type = $params['type'];
            if ($type == 'csv') {
                return new CSVReportFile();
            } elseif ($type == 'pdf') {
                return new PdfReportFile();
            }
        });
    }
}
