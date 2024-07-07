<?php
// require('../src/index.php');
use PHPUnit\Framework\TestCase;

class testapi extends TestCase
{
    
    public function testApiOutput()
    {
        // Create input data
        $_REQUEST = [
            'item_1' => 'Item A',
            'item_2' => 'Item B',
            'item_3' => 'Item C',
            'item_4' => 'Item D', 
            'attendance_1' => 10,
            'attendance_2' => 2,
            'attendance_3' => 5,
            'attendance_4' => 8, 
        ];
        
        // Capture the output of the script
        ob_start();
        include '../src/index.php'; 
        $output = ob_get_clean();
        print_r($output);
        
        // Decode the JSON output
        $decodedOutput = json_decode($output, true);
        print_r($decodedOutput);
        
        // Assert that the output contains expected keys
        $this->assertArrayHasKey('error', $decodedOutput);
        $this->assertArrayHasKey('items', $decodedOutput);
        $this->assertArrayHasKey('attendance', $decodedOutput);
        $this->assertArrayHasKey('sorted_attendance', $decodedOutput);
        
    }
}
