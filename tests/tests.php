<?php
/**
 * Created by PhpStorm.
 * User: andrewcraver
 * Date: 4/20/16
 * Time: 1:39 PM
 */

namespace tests;

use PHPUnit\Framework\TestCase;
use softAssert\SoftAssert;

require_once dirname(__DIR__ ) . '/softAssert/softAssert.php';

/**
 * Class tests
 * @package tests
 */
class tests extends TestCase
{
    /**
     * soft assert property.
     * @var SoftAssert
     */
    private $softAssert;

    /**
     * setup function.
     */
    public function setUp()
    {
        $this->softAssert = new SoftAssert();
    }

    /**
     * test function.
     * @expectedException \PHPUnit\Framework\AssertionFailedError
     */
    public function testGreaterThanDefaultMessage()
    {
        $this->softAssert->assert('assertGreaterThan', 2, 1);
        $this->softAssert->assert('assertGreaterThan', 1, 2);

        $this->softAssert->assertAll();
    }

    /**
     * test function.
     * @expectedException \PHPUnit\Framework\AssertionFailedError
     */
    public function testEqualsCustomMessage()
    {
        $this->softAssert->assert('assertEquals', 1, 2, 'custom error message');
        $this->softAssert->assert('assertEquals', 2, 2, 'custom error message');

        $this->softAssert->assertAll();
    }

    /**
     * test function.
     * @expectedException \PHPUnit\Framework\AssertionFailedError
     */
    public function testMultipleFailures()
    {
        $this->softAssert->assert('assertNotEquals', 2, 2, 'custom error message');
        $this->softAssert->assert('assertStringStartsWith', 'asdf', 'fdas');
        $this->softAssert->assert('assertTrue', false);

        $this->softAssert->assertAll();
    }

    /**
     * test function.
     */
    public function testSuccess()
    {
        $this->softAssert->assert('assertStringEndsWith', 'ing', 'ending', 'custom error message');

        $this->softAssert->assertAll();
    }
}