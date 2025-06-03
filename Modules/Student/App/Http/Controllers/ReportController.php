<?php

namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Student\App\Http\Requests\CreateReportRequest;
use Modules\Student\Services\ReportService;

class ReportController extends Controller
{
    protected $report_service;

    public function __construct(ReportService $report_service)
    {
        $this->report_service = $report_service;
    }

    public function index()
    {
        return $this->report_service->index();
    }
    public function create(CreateReportRequest $message)
    {
        return $this->report_service->create($message);
    }

    public function show($message)
    {
        return $this->report_service->show($message);
    }
}
