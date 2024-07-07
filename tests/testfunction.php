<?php
require('../src/functions.inc.php');
use PHPUnit\Framework\TestCase;

class testfunction extends TestCase
{
    public function testGetSortedAttendance()
    {
        $items = ['Item A', 'Item B', 'Item C'];
        $attendances = [10, 5, 8];
        
        $expectedResult = [
            ['item' => 'Item A', 'attendance' => 10],
            ['item' => 'Item C', 'attendance' => 8],
            ['item' => 'Item B', 'attendance' => 5],
        ];
        
        $result = getSortedAttendance($items, $attendances);
        $this->assertEquals($expectedResult, $result);
    }
    
    public function testGetSortedAttendanceWithEmptyArrays()
    {
        $items = [];
        $attendances = [];
        
        $expectedResult = [];
        
        $result = getSortedAttendance($items, $attendances);
        $this->assertEquals($expectedResult, $result);
    }
    
    public function testGetSortedAttendanceWithEqualAttendances()
    {
        $items = ['Item A', 'Item B', 'Item C'];
        $attendances = [5, 5, 5];
        
        $expectedResult = [
            ['item' => 'Item A', 'attendance' => 5],
            ['item' => 'Item B', 'attendance' => 5],
            ['item' => 'Item C', 'attendance' => 5],
        ];
        
        $result = getSortedAttendance($items, $attendances);
        $this->assertEquals($expectedResult, $result);
    }
}
