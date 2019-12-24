/*
Type hinting and return types
With the release of PHP 7, the language allows the developer to be more specific about what functions are getting and returning. You can—always optionally—specify the type of argument that the function needs (type hinting), and the type of result the function will return (return type). Let's first see an example:
This preceding function states that the arguments need to be integer, integer, and Boolean, and that the result will be an integer. Now, you know that PHP has type juggling, so it can usually transform a value of one type to its equivalent value of another type, for example, the string "2" can be used as integer 2. To stop PHP from using type juggling with the arguments and results of functions, you can declare the directive strict_types as shown in the first highlighted line. This directive has to be declared at the top of each file where you want to enforce this behavior.


<?php

declare(strict_types=1);

function addNumbers(int $a, int $b, bool $printSum): int {
    $sum = $a + $b;
    if ($printSum) {
        echo 'The sum is ' . $sum;
    }
    return $sum;
}

addNumbers(1, 2, true);
addNumbers(1, '2', true); // it fails when strict_types is 1
addNumbers(1, 'something', true); // it always fails
