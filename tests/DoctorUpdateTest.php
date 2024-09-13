<?php

use PHPUnit\Framework\TestCase;

class DoctorUpdateTest extends TestCase
{
    protected function setUp(): void
    {
        // Start output buffering to capture header redirects
        ob_start();

        // Mock the $_POST array
        $_POST = [
            'name' => 'Dr. John Doe',
            'oldemail' => 'oldemail@example.com',
            'nic' => '123456789V',
            'spec' => 1,
            'email' => 'newemail@example.com',
            'Tele' => '0771234567',
            'password' => 'password123',
            'cpassword' => 'password123',
            'id00' => 1,
        ];

        // Mock the database connection
        $this->mockDatabase();
    }

    protected function tearDown(): void
    {
        // Clear output buffering
        ob_end_clean();

        // Reset globals
        $_POST = [];
        $_GET = [];
    }

    protected function mockDatabase()
    {
        global $database;

        // Create a mock of the database connection
        $database = $this->getMockBuilder(mysqli::class)
                         ->disableOriginalConstructor()
                         ->getMock();

        // Mock the query() method to simulate database results
        $database->method('query')
                 ->willReturnCallback(function ($query) {
                     if (strpos($query, "select doctor.docid") !== false) {
                         // Simulate a result set with 1 row
                         $mockResult = $this->createMock(mysqli_result::class);
                         $mockResult->method('num_rows')->willReturn(1);
                         $mockResult->method('fetch_assoc')->willReturn(['docid' => 2]);
                         return $mockResult;
                     } elseif (strpos($query, "update doctor set") !== false) {
                         // Simulate successful update
                         return true;
                     } elseif (strpos($query, "select * from webuser") !== false) {
                         // Simulate user result
                         $mockResult = $this->createMock(mysqli_result::class);
                         return $mockResult;
                     }
                     return false;
                 });
    }
 
    public function testDoctorUpdate()
    {
        // Include the script to test
        include 'doctor/edit-doc.php';

        // Capture the header
       // $headers = xdebug_get_headers();

        // Assert that the script redirects to settings.php with the appropriate error
        $this->assertStringContainsString('location: settings.php', $headers[0]);
        $this->assertStringContainsString('error=1', $headers[0]);
    }
}
