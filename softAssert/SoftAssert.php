<?php
/**
 * Created by PhpStorm.
 * User: andrewcraver
 * Date: 4/20/16
 * Time: 1:39 PM
 */

namespace softAssert;

/**
 * Class SoftAssert
 * @package softAssert
 */
class SoftAssert
{
    /**
     * soft assert error array.
     * @var array
     */
    private $softAssertErrors = array();

    /**
     * general soft assert function.
     * can be used for any assertion, takes variable args depending on assertion being called.
     * example call: $this->assert('assertEquals', 1.1, 1.2, 'custom message', 0.1).
     * @author acraver
     * @param $assertion
     * @param array ...$args
     * @throws \Exception
     */
    public function assert($assertion, ...$args)
    {
        if (method_exists('PHPUnit_Framework_Assert', $assertion)) {
            try {
                \PHPUnit_Framework_Assert::$assertion(...$args);
            } catch (\PHPUnit_Framework_AssertionFailedError $e) {
                $this->formatPushSoftAssertError($e);
            }
        } else {
            throw new \Exception("$assertion is not a valid assertion!");
        }
    }

    /**
     * formats the error by taking message and stack trace and pushing to error array
     * @param \PHPUnit_Framework_AssertionFailedError $e
     */
    private function formatPushSoftAssertError(\PHPUnit_Framework_AssertionFailedError $e)
    {
        $message = rtrim($e->getMessage(), "\n");
        $trace = $e->getTraceAsString();
        $start = strpos($trace, __FILE__);
        $start = strpos($trace, ' /', $start);
        $end = strpos($trace, ':', $start);
        $trace = substr($trace, $start, $end-$start);
        $this->softAssertErrors[] = $message . "\n" . $trace;
    }

    /**
     * throws exception with all failures if they exist.
     * call this function at end of test.
     */
    public function assertAll()
    {
        if (!empty($this->softAssertErrors)) {
            $i = 1;
            $errorsString = "The following asserts failed:\n\n";
            foreach ($this->softAssertErrors as $err) {
                $errorsString .= "$i) $err\n\n";
                $i++;
            }
            throw new \PHPUnit_Framework_AssertionFailedError("Test FAILED\n\n$errorsString");
        }
    }
}