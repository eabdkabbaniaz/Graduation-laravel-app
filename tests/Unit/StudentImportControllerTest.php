<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Modules\Student\App\Http\Controllers\StudentImportController;
use Modules\Student\App\Jobs\ImportStudentsJob;
use Modules\Student\Services\ArchiveService;
use Modules\Student\Services\CategoryService;
use Modules\Student\Services\StudentImportService;
use Tests\TestCase;
use Mockery;

class StudentImportControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $categoryService;
    protected $studentService;
    protected $archiveService;
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categoryService = Mockery::mock(CategoryService::class);
        $this->studentService = Mockery::mock(StudentImportService::class);
        $this->archiveService = Mockery::mock(ArchiveService::class);

        $this->controller = new StudentImportController(
            $this->categoryService,
            $this->studentService,
            $this->archiveService
        );
    }

    public function test_import_with_archive_triggers_archive_and_import_logic()
    {
        // Arrange
        Queue::fake();

        $file = UploadedFile::fake()->create('students.xlsx');

        $request = [
            'archive' => 'yes',
            'file' => $file,
            'category_number' => 3,
            'distributionMethod' => 'sequential',
            'university_id' => 5
        ];

        $categoryIds = [1, 2, 3];

        $this->archiveService
            ->shouldReceive('handle')
            ->once();

        $this->categoryService
            ->shouldReceive('createBatchCategories')
            ->with($request['category_number'])
            ->once()
            ->andReturn($categoryIds);

        $this->studentService
            ->shouldReceive('importAndDistributeStudents')
            ->withArgs(function ($data, $categories) use ($categoryIds) {
                return $data['distributionMethod'] === 'sequential' && $categories === $categoryIds;
            })
            ->once()
            ->andReturn(response()->json(['message' => 'جاري استيراد البيانات في الخلفية']));

        // Act
        // $response = $this->controller->import(new \Illuminate\Http\Request($request));
$requestMock = \Mockery::mock(\Modules\Student\App\Http\Requests\ImportStudentRequest::class);
$requestMock->shouldReceive('file')->andReturn($file);
$requestMock->shouldReceive('get')->with('archive')->andReturn('yes');
$requestMock->shouldReceive('input')->with('archive')->andReturn('yes');
$requestMock->shouldReceive('offsetGet')->with('archive')->andReturn('yes');
$requestMock->shouldReceive('offsetGet')->with('category_number')->andReturn($request['category_number']);
$requestMock->shouldReceive('offsetGet')->with('distributionMethod')->andReturn($request['distributionMethod']);
$requestMock->shouldReceive('offsetGet')->with('university_id')->andReturn($request['university_id']);
$requestMock->shouldReceive('all')->andReturn($request);

$response = $this->controller->import($requestMock);

        // Assert
        $this->assertEquals(200, $response->status());
$this->assertEquals('جاري استيراد البيانات في الخلفية', json_decode($response->getContent(), true)['message']);
    }

    protected function tearDown(): void
    {
        Mockery::close(); 
        parent::tearDown();
    }
}
