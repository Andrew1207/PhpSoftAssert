# php-soft-assert

- When an assertion fails, don't throw an exception but record the failure.
- Calling softAssertAll() at end of test will cause an exception to be thrown if at least one soft assertion failed.  All failed assertions will be listed with the message and stack trace line where failure occurred.
- Usage examples can be found in tests.php.



#Example 1:

$this->softAssert('assertGreaterThan', 2, 1);
<br>
$this->softAssert('assertGreaterThan', 1, 2);
<br>
$this->softAssertAll();
<br>
<br>
<br>
This would produce the following exception:
<br>
<br>
<br>
The following asserts failed:
<br>
1) Failed asserting that 1 is greater than 2.
<br>
 /path/to/test.php(<line #>)



#Example 2:
 
$this->softAssert('assertNotEquals', 2, 2, 'custom error message');
<br>
$this->softAssert('assertStringStartsWith', 'asdf', 'fdas');
<br>
$this->softAssert('assertTrue', false);
<br>
$this->softAssertAll();
<br>
<br>
<br>
This would produce the following exception:
<br>
<br>
<br>
The following asserts failed:
<br>
1) custom error message
<br>
Failed asserting that 2 is not equal to 2.
<br>
/path/to/test.php(<line #>)
<br>
2) Failed asserting that 'fdas' starts with "asdf".
<br>
/path/to/test.php(<line #>)
<br>
3) Failed asserting that false is true.
<br>
/path/to/test.php(<line #>)
<br>