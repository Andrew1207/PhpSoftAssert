# php-soft-assert

- When an assertion fails, don't throw an exception but record the failure.
- Calling softAssertAll() at end of test will cause an exception to be thrown if at least one soft assertion failed.  All failed assertions will be listed with the message and stack trace line.