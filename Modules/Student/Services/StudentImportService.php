<?php

namespace Modules\Student\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Storage;
use Modules\Student\App\Jobs\ImportStudentsJob;
use Modules\Student\App\Models\Archive;
use Modules\Student\App\Models\Category;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Modules\Traits\ApiResponseTrait;


class StudentImportService
{

    // public function importAndDistributeStudents($data, $category)
    // {
    //     try {
    //         $importFile = $data->file('file');
    //         $totalStudents = $this->numberStudent($importFile);
    //         $countCategory = ceil($totalStudents / $data->category_number);
    //         $distributor = CategoryDistributorFactory::createDistributor($data->distributionMethod, $this->numberStudent($importFile), $category);
    //         Excel::import(new StudentsImport($distributor), $importFile);
    //         return ApiResponseTrait::successResponse("تم استيراد {$totalStudents} طالبًا بنجاح، وتم وضع كل {$countCategory} طالب في فئة.");
    //     } catch (\Throwable $e) {
    //         return ApiResponseTrait::errorResponse("حدث خطأ أثناء الاستيراد: " . $e->getMessage());
    //     }
    // }
    public function importAndDistributeStudents($data, $category)
    {
        try {
            $importFile = $data->file('file');
            $filePath = $importFile->store('imports'); // يحفظ الملف داخل storage/app/imports
            $university_id=$data['university_id'];
          

            ImportStudentsJob::dispatch(
                $filePath,
                $category,
                $data->distributionMethod,
                $data->category_number,
                $university_id
            );
            return ApiResponseTrait::successResponse("جاري استيراد البيانات في الخلفية، سيتم إعلامك عند الانتهاء.");
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse("حدث خطأ أثناء تجهيز الاستيراد: " . $e->getMessage());
        }
    }
    // public function numberStudent($importFile)
    // {
    //     $filePath = $importFile->getRealPath();
    //     $spreadsheet = IOFactory::load($filePath);
    //     $worksheet = $spreadsheet->getActiveSheet();
    //     $rows = $worksheet->toArray();
    //     if (count($rows) <= 1) {
    //         throw new Exception("الملف فارغ أو لا يحتوي على بيانات.");
    //     }
    //     return count($rows) - 1;
    // }
    public function handle($university_id)
    {
        $students = User::with('category')->where('university_id', $university_id)->get();
     
       // $category = Category::where('university_id', $university_id)->get();

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

        Archive::create([
            'file_path' => $fileName,
            'model' => 'Student',
            'description' => 'أرشفة طلاب السنة الثالثة - صيدلة',
            'archived_at' => now(),
        ]);


    

        User::where('university_id', $university_id)->delete();
        Category::where('university_id', $university_id)->delete();

       
    }
}
