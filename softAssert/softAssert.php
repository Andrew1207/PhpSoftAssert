<?php
/**
 * Created by PhpStorm.
 * User: andrewcraver
 * Date: 4/20/16
 * Time: 1:39 PM
 */

namespace softAssert;

/**
 * Class softAssert
 * @package softAssert
 */
class softAssert extends \PHPUnit_Framework_TestCase
{
    /**
     * soft assert property.
     * @var array
     */

    private $m_errors = array();

    /**
     * soft assert function.
     * @param $expected
     * @param $actual
     * @param string $message
     * @param float $delta
     */

    public function softAssertEquals($expected, $actual, $message = '', $delta = 0.0)
    {
        try {
            $this->assertEquals($expected, $actual, $message, $delta);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $expected
     * @param $actual
     * @param string $message
     */

    public function softAssertNotEquals($expected, $actual, $message = '')
    {
        try {
            $this->assertNotEquals($expected, $actual, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $condition
     * @param string $message
     */

    public function softAssertTrue($condition, $message = '')
    {
        try {
            $this->assertTrue($condition, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $needle
     * @param $haystack
     * @param string $message
     * @param bool|false $ignoreCase
     */

    public function softAssertContains($needle, $haystack, $message = '', $ignoreCase = false)
    {
        try {
            $this->assertContains($needle, $haystack, $message, $ignoreCase);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $needle
     * @param $haystack
     * @param string $message
     * @param bool|false $ignoreCase
     */

    public function softAssertNotContains($needle, $haystack, $message = '', $ignoreCase = false)
    {
        try {
            $this->assertNotContains($needle, $haystack, $message, $ignoreCase);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $subset
     * @param $array
     * @param string $message
     */

    public function softAssertArraySubset($subset, $array, $message = '')
    {
        try {
            $this->assertArraySubset($subset, $array, false, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $filename
     * @param string $message
     */

    public function softAssertFileExists($filename, $message = '')
    {
        try {
            $this->assertFileExists($filename, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $expected
     * @param $actual
     * @param string $message
     */

    public function softAssertGreaterThan($expected, $actual, $message = '')
    {
        try {
            $this->assertGreaterThan($expected, $actual, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $suffix
     * @param $string
     * @param string $message
     */

    public function softAssertStringEndsWith($suffix, $string, $message = '')
    {
        try {
            $this->assertStringEndsWith($suffix, $string, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $prefix
     * @param $string
     * @param string $message
     */

    public function softAssertStringStartsWith($prefix, $string, $message = '')
    {
        try {
            $this->assertStringStartsWith($prefix, $string, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * @param $format
     * @param $string
     * @param string $message
     */

    public function softAssertStringMatchesFormat($format, $string, $message = '')
    {
        try {
            $this->assertStringMatchesFormat($format, $string, $message);
        } catch (\PHPUnit_Framework_AssertionFailedError $e) {
            $this->formatPushSoftAssertError($e);
        }
    }

    /**
     * soft assert function.
     * formats the error by taking message and stack trace and pushing to error array
     * @param \PHPUnit_Framework_AssertionFailedError $e
     */

    private function formatPushSoftAssertError(\PHPUnit_Framework_AssertionFailedError $e)
    {
        $message = explode("\n",$e->getMessage());
        $trace = $e->getTraceAsString();
        $start = strpos($trace, __FILE__);
        $start = strpos($trace, ' /', $start);
        $end = strpos($trace, ':', $start);
        $trace = substr($trace, $start, $end-$start);
        array_push($this->m_errors,$message[0]."\n".$trace);
    }

    /**
     * soft assert function.
     */

    public function softAssertAll()
    {
        if (!empty($this->m_errors)) {
            $i = 1;
            $errorsString = "The following asserts failed:\n\n";
            foreach ($this->m_errors as $err) {
                $errorsString .= "$i) $err\n\n";
                $i++;
            }
            throw new \PHPUnit_Framework_AssertionFailedError("Test FAILED\n\n$errorsString");
        }
    }

}