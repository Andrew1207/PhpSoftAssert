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
        $this->softAssert('assertGreaterThan', 2, 1);
        $this->softAssert('assertGreaterThan', 1, 2);
    }

    /**
     * test function.
     */

    public function testEqualsCustomMessage()
    {
        $this->softAssert('assertEquals', 1, 2,'custom error message');
        $this->softAssert('assertEquals', 2, 2,'custom error message');
    }

    /**
     * test function.
     */

    public function testMultipleFailures()
    {
        $this->softAssert('assertNotEquals', 2, 2, 'custom error message');
        $this->softAssert('assertStringStartsWith', 'asdf', 'fdas');
        $this->softAssert('assertTrue', false);
    }

    /**
     * test function.
     */

    public function testSuccess()
    {
        $this->softAssert('assertStringEndsWith', 'ing', 'ending' , 'custom error message');
    }
}