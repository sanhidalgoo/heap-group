<?php

namespace App\Interfaces;

interface ReportFile
{
    public function download($name, $data);
}
