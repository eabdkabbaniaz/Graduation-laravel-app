<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Experience\App\Models\Drug;
use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\Semester;
use Modules\Experience\App\Models\Session;
use Modules\Student\App\Models\Category;
use Modules\Student\App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {

        $category = Category::firstOrCreate(
            ['name' => "$i الفئة"],

        );}
        for ($j= 1; $j <=5; $j++) {

        for ($i = 1; $i <= 100; $i++) {
            $user = User::create([
                'name' => "طالب  $i$j",
                'email' => "123456$i$j",
                'password' => Hash::make('password'),
            ]);

            Student::create([
                'user_id' => $user->id,
                'category_id' => $j,
            ]);
            $user->assignRole('student');
        }}

           // Create Semesters
        $semester1 = Semester::create(['name' => 'الفصل الأول']);
        $semester2 = Semester::create(['name' => 'الفصل الثاني']);

        // Create Experiences
        $intestine = Experience::create(['name' => 'تجربة المعي']);
        $frogHeart = Experience::create(['name' => 'تجربة قلب ضفدع']);

        // Attach Experiences to Semesters
        DB::table('experineces_semesters')->insert([
            ['experience_id' => $intestine->id, 'semester_id' => $semester1->id],
            ['experience_id' => $frogHeart->id, 'semester_id' => $semester1->id],
            ['experience_id' => $intestine->id, 'semester_id' => $semester2->id],
            ['experience_id' => $frogHeart->id, 'semester_id' => $semester2->id],
        ]);

//         // Create Drugs
//         $acetylcholine = Drug::create(['name' => 'أستيل كولين']);
//         $adrenaline = Drug::create(['name' => 'أدرينالين']);
//         $atropine = Drug::create(['name' => 'أتروبين']);

//         // Link Drugs to Experiences
//         foreach ([$acetylcholine, $adrenaline, $atropine] as $drug) {
//             DB::table('experience_drugs')->insert([
//                 'drug_id' => $drug->id,
//                 'experience_id' => $intestine->id,
//                 'effect' => true,
//             ]);
//         }

//         foreach ([$acetylcholine, $atropine] as $drug) {
//             DB::table('experience_drugs')->insert([
//                 'drug_id' => $drug->id,
//                 'experience_id' => $frogHeart->id,
//                 'effect' => true,
//             ]);
//         }

//         // Create 3 Sessions for frogHeart in semester 1
//         $expSem = DB::table('experineces_semesters')
//             ->where('experience_id', $frogHeart->id)
//             ->where('semester_id', $semester1->id)
//             ->first();

//         // You might want to change teacher_id to an actual existing user id
//         $teacherId = 1;

//         $session1 = Session::create([
//             'name' => 'جلسة أستيل كولين',
//             'code' => 'S1',
//             'experience_id' => $expSem->id,
//             'teacher_id' => $teacherId,
//         ]);

//         $session2 = Session::create([
//             'name' => 'جلسة أتروبين',
//             'code' => 'S2',
//             'experience_id' => $expSem->id,
//             'teacher_id' => $teacherId,
//         ]);

//         $session3 = Session::create([
//             'name' => 'جلسة أستيل كولين + أتروبين',
//             'code' => 'S3',
//             'experience_id' => $expSem->id,
//             'teacher_id' => $teacherId,
//         ]);

//         DB::table('drug_sessions')->insert([
//             ['session_id' => $session1->id, 'drug_id' => $acetylcholine->id],
//             ['session_id' => $session2->id, 'drug_id' => $atropine->id],
//             ['session_id' => $session3->id, 'drug_id' => $acetylcholine->id],
//             ['session_id' => $session3->id, 'drug_id' => $atropine->id],
//         ]);
//     }
}
    }