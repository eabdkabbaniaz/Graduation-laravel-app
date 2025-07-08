<?php

namespace Modules\Student\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Modules\Exam\App\Models\ExamUser;
use Modules\Student\App\Models\Archive;
use Modules\Student\App\Models\Category;

class ArchiveService
{

    public function handle()
    {
        $students = User::with('category', 'exam')->get();
        if ($students->isEmpty()) {
            return ('لا يوجد طلاب لأرشفتهم.');
            return;
        }
        $jsonData = $students->toJson();
        $fileName = 'archives/pharmacy_year3_' . now()->format('Y_m_d_His') . '.json';
        Storage::disk('local')->put($fileName, $jsonData);
        Archive::create([
            'file_path' => $fileName,
            'model' => 'Student',
            'description' => 'أرشفة طلاب السنة الثالثة - صيدلة',
            'archived_at' => now(),
        ]);

        User::query()->delete();
        Category::query()->delete();
    }
}
