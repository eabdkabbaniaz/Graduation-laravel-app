<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Modules\Student\App\Models\Category;
use Modules\Student\App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {

        $category = Category::firstOrCreate(
            ['name' => 'الفئة'],

        );

        // ✅ إنشاء 20 طالب
        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'name' => "طالب رقم $i",
                'email' => "student$i@example.com",
                'password' => Hash::make('password'),
            ]);

            Student::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ]);
        }

      
    }
}
