<?php
/**
 * Created by PhpStorm.
 * User: andrewcraver
 * Date: 4/20/16
 * Time: 2:14 PM
 */

namespace tests;


class test2 extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        echo realpath (dirname(__FILE__));
    }

}