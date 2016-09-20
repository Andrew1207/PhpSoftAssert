<?php
/**
 * Created by PhpStorm.
 * User: andrewcraver
 * Date: 4/20/16
 * Time: 1:39 PM
 */

namespace tests;

use softAssert\softAssert;
require_once dirname(__DIR__ ) . '/softAssert/softAssert.php';

/**
 * Class tests
 * @package tests
 */
class tests extends softAssert
{
    /**
     * test function.
     * @expectedException \PHPUnit_Framework_AssertionFailedError
     */

    public function testGreaterThanDefaultMessage()
    {
        $this->softAssert('assertGreaterThan', 2, 1);
        $this->softAssert('assertGreaterThan', 1, 2);

        print_r($this->softAssertErrors);
        $this->softAssertAll();
    }

    /**
     * test function.
     * @expectedException \PHPUnit_Framework_AssertionFailedError
     */

    public function testEqualsCustomMessage()
    {
        $this->softAssert('assertEquals', 1, 2, 'custom error message');
        $this->softAssert('assertEquals', 2, 2, 'custom error message');

        print_r($this->softAssertErrors);
        $this->softAssertAll();
    }

    /**
     * test function.
     * @expectedException \PHPUnit_Framework_AssertionFailedError
     */

    public function testMultipleFailures()
    {
        $this->softAssert('assertNotEquals', 2, 2, 'custom error message');
        $this->softAssert('assertStringStartsWith', 'asdf', 'fdas');
        $this->softAssert('assertTrue', false);

        print_r($this->softAssertErrors);
        $this->softAssertAll();
    }

    /**
     * test function.
     */

    public function testSuccess()
    {
        $this->softAssert('assertStringEndsWith', 'ing', 'ending', 'custom error message');
    }
}