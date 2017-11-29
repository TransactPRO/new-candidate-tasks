<?php
namespace Tpro\Easy\Nesting;

/**
 * @group Easy/Nesting
 */
class NestingTest extends \PHPUnit_Framework_TestCase
{
    /** @var Nesting */
    private $nesting;

    protected function setUp()
    {
        $this->nesting = new Nesting();
    }

    /**
     * @dataProvider getValidCases
     */
    public function testValidCases($string)
    {
        $result = $this->nesting->check($string);
        $this->assertTrue(
            $result,
            "Expected that properly nested string '$string' got 'true' as result. Got '" . json_encode(
                $result
            ) . "' instead."
        );
    }

    public function getValidCases()
    {
        return array(
            array("Hello (world)"),
            array("Hello world"),
            array(""),
            array("()"),
            array("()()()()"),
            array("(((())))"),
            array("(((i)()))e"),
        );
    }

    /**
     * @dataProvider getInvalidCases
     */
    public function testInvalidCases($string)
    {
        $result = $this->nesting->check($string);
        $this->assertFalse(
            $result,
            "Expected that invalid string '$string' got 'false' as result. Got '" . json_encode(
                $result
            ) . "' instead."
        );
    }

    public function getInvalidCases()
    {
        return array(
            array("Hello (world"),
            array("(((((((((("),
            array("((]()"),
            array("(((i(()))e"),
            array(")))))")
        );
    }
}
 
