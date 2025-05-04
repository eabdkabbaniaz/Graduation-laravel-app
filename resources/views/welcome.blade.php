<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('export') }}">
    @csrf

    <input type="hidden" name="columns[name]" value="الاسم">
    <input type="hidden" name="columns[final_grade]" value="العلامة النهائية">
    <!-- <input type="hidden" name="columns[assessment_score]" value="محصلة التقييم">
    <input type="hidden" name="columns[exam_score]" value="محصلة الاختبار">
    <input type="hidden" name="columns[attendance_average]" value="معدل الحضور"> -->

    <button type="submit" class="btn btn-primary">📥 تحميل ملف العلامات</button>
</form>

    
</body>
</html>