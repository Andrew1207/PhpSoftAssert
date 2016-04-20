<?php
/**
 * Created by PhpStorm.
 * User: andrewcraver
 * Date: 4/20/16
 * Time: 1:39 PM
 */

namespace tests;

use softAssert\softAssert;
require_once('../../php-soft-assert/softAssert/softAssert.php');

/**
 * Class tests
 * @package tests
 */
class tests extends softAssert
{
    /**
     * tearDown function.
     */

    public function tearDown()
    {
        $this->softAssertAll();
    }

    /**
     * test function.
     */

    public function testGreaterThanDefaultMessage()
    {
        $this->softAssertGreaterThan(2,1);
        $this->softAssertGreaterThan(1,2);
    }

    /**
     * test function.
     */

    public function testEqualsCustomMessage()
    {
        $this->softAssertEquals(1,2,"custom error message");
        $this->softAssertEquals(2,2,"custom error message");
    }

    /**
     * test function.
     */

    public function testMultipleFailures()
    {
        $this->softAssertNotEquals(2,2,"custom error message");
        $this->softAssertStringStartsWith("asdf","fdas");
        $this->softAssertTrue(false);
    }

    /**
     * test function.
     */

    public function testSuccess()
    {
        $this->softAssertStringEndsWith("ing","ending","custom error message");
    }
}