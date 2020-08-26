<?php

namespace Tests\Feature;

use App\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{
    public function test_returns_an_array()
    {
        $mockedCourses = include 'tests/Unit/Mock_CoursesCodeAcademy.php';
        $candidate = factory(Candidate::class)->make(['codeacademy' => 'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);
        $scraper = new CodeAcademyScraping($candidate);

        $scrappedCourses = $scraper->getAllCourses();
        $this->assertIsArray($scrappedCourses);
        $this->assertEquals($mockedCourses, $scrappedCourses);
    }

    public function test_returns_last_connection()
    {
        $candidate = factory(Candidate::class)->make(['codeacademy' => 'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);

        $scraper = new CodeAcademyScraping($candidate);
        $lastConnection = $scraper->lastConnection();

        $this->assertTrue(str_contains($lastConnection, 'Last coded'));

    }


}
