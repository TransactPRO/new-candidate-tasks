<?php
namespace Tpro\Easy\Permutation;

/**
 * @group Easy/Permutation
 */
class PermutationTest extends \PHPUnit_Framework_TestCase
{
    /** @var Permutation */
    private $permutation;

    protected function setUp()
    {
        $this->permutation = new Permutation();
    }

    /**
     * @dataProvider getSimpleValidCases
     */
    public function testSimpleValidCases(array $array)
    {
        $result = $this->permutation->check($array, count($array));
        $this->assertTrue(
            $result,
            "Array " . json_encode($array) . " is valid permutation, expected 'true' as result. " .
            "Got '" . json_encode($result) . "'."
        );
    }

    public function getSimpleValidCases()
    {
        $generatedArray = range(1, 10);
        shuffle($generatedArray);
        return array(
            array(array(1, 2, 3, 4)),
            array(array(4, 3, 2, 1)),
            array(array(2, 1, 4, 3)),
            array(array(1)),
            array($generatedArray),
        );
    }

    /**
     * @dataProvider getSimpleInvalidCases
     */
    public function testSimpleInvalidCases(array $array)
    {
        $result = $this->permutation->check($array, count($array));
        $this->assertFalse(
            $result,
            "Array " . json_encode($array) . " is invalid permutation, expected 'false' as result. " .
            "Got '" . json_encode($result) . "'."
        );
    }

    public function getSimpleInvalidCases()
    {
        $generatedArray = range(1, 10);
        unset($generatedArray[4]);
        shuffle($generatedArray);
        return array(
            array(array(2, 3, 4)),
            array(array(4, 3, 2)),
            array(array(10)),
            array(array(5, 2, 7)),
            array($generatedArray)
        );
    }

    public function testLargeValidDataSet()
    {
        $generatedArray = range(1, 1000000);
        shuffle($generatedArray);
        $start         = microtime(true);
        $result        = $this->permutation->check($generatedArray, count($generatedArray));
        $executionTime = microtime(true) - $start;
        $this->assertTrue($result, 'Dataset must be valid permutation.');
        $this->assertLessThan(
            1,
            $executionTime,
            'Execution time must be less then 1 second. Expected time complexity - O(n)'
        );
    }

    public function testLargeInvalidDataSet()
    {
        $generatedArray = range(1, 1000000);
        unset($generatedArray[79721]);
        shuffle($generatedArray);
        $start         = microtime(true);
        $result        = $this->permutation->check($generatedArray, count($generatedArray));
        $executionTime = microtime(true) - $start;
        $this->assertFalse($result, 'Dataset must be invalid permutation.');
        $this->assertLessThan(
            1,
            $executionTime,
            'Execution time must be less then 1 second. Expected time complexity - O(n)'
        );
    }
}
 