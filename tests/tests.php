<?php

namespace tests;

use softAssert\softAssert;
require_once('../../php-soft-assert/softAssert/softAssert.php');

class tests extends softAssert
{
    public function tearDown()
    {
        $this->softAssertAll();
    }

    public function testGreaterThanDefaultMessage()
    {
        $this->softAssertGreaterThan(2,1);
        $this->softAssertGreaterThan(1,2);
    }

    public function testEqualsCustomMessage()
    {
        $this->softAssertEquals(1,2,"custom error message");
        $this->softAssertEquals(2,2,"custom error message");
    }

    public function testMultipleFailures()
    {
        $this->softAssertNotEquals(2,2,"custom error message");
        $this->softAssertStringStartsWith("asdf","fdas");
        $this->softAssertTrue(false);
    }

    public function testSuccess()
    {
        $this->softAssertStringEndsWith("ing","ending","custom error message");
    }
}