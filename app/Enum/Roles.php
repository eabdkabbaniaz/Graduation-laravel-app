<?php 
namespace App\Enum;

class Roles {

    const TEACHER = "teacher";
    const STUDENT = "student";
    const MANGER = "manger";
    const SUPERVISRTEACHER = "superVisorTeacher";

    public function roles() {
        return [
            self::TEACHER,
            self::STUDENT,
            self::MANGER,
            self::SUPERVISRTEACHER
        ];
    }
}
