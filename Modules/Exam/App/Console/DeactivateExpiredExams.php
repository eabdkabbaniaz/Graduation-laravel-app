<?php

namespace Modules\Exam\App\Console;

use Illuminate\Console\Command;
use Modules\Exam\Repository\ExamRepository;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class DeactivateExpiredExams extends Command
{
    protected $signature = 'exams:deactivate-expired';
    protected $description = 'Deactivate exams that have passed their end date';

    protected $examRepo;

    public function __construct(ExamRepository $examRepo)
    {
        parent::__construct();
        $this->examRepo = $examRepo;
    }

    public function handle()
    {
        $expired = $this->examRepo->expired();

        foreach ($expired as $exam) {
            $exam->update(['status' =>false]);
       
       
        }

      
    
        }}