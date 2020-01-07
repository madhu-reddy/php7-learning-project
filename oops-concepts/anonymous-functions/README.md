https://www.elated.com/php-anonymous-functions/

```Anonymous functions```
```
As you probably know, you define a regular function in PHP like this:


function myFunctionName() {
  // (Your function code goes here)
}
When you define a function, you give it a name (myFunctionName in the above example). PHP then lets your code refer to this function using its name. For example, you can call your function like this:


myFunctionName();
Anonymous functions are similar to regular functions, in that they contain a block of code that is run when they are called. They can also accept arguments, and return values.

The key difference — as their name implies — is that anonymous functions have no name. Here’s a code example that creates a simple anonymous function:

// Declare a basic anonymous function
// (not much use on its own!)
function( $name, $timeOfDay ) {
  return ( "Good $timeOfDay, $name!" );
};


```

```
There are two subtle but important differences between the above example and a regular function definition:

There is no function name between the function keyword and the opening parenthesis ('('). This tells PHP that you’re creating an anonymous function.
There is a semicolon after the function definition. This is because anonymous function definitions are expressions, whereas regular function definitions are code constructs.

```

```
While the above code is perfectly valid, it isn’t very useful. Since the anonymous function has no name, you can’t refer to it anywhere else in your code, so it can never be called!

However, since an anonymous function is an expression — much like a number or a string — you can do various handy things with it. For example, you can:

Assign it to a variable, then call it later using the variable’s name. You can even store a bunch of different anonymous functions in a single array.
Pass it to another function that can then call it later. This is known as a callback.
Return it from within an outer function so that it can access the outer function’s variables. This is known as a closure.
You’ll explore these three techniques in the rest of this tutorial.

```

** Assigning anonymous functions to variables **
```
When you define an anonymous function, you can then store it in a variable, just like any other value. Here’s an example:

// Assign an anonymous function to a variable
$makeGreeting = function( $name, $timeOfDay ) {
  return ( "Good $timeOfDay, $name!" );
};
Once you’ve done that, you can call the function using the variable’s name, just like you call a regular function:

// Call the anonymous function
echo $makeGreeting( "Fred", "morning" ) . "<br>";
echo $makeGreeting( "Mary", "afternoon" ) . "<br>";
This produces the output:


Good morning, Fred!
Good afternoon, Mary!
You can even store several functions inside an array, like this:

// Store 3 anonymous functions in an array
$luckyDip = array(

  function() {
    echo "You got a bag of toffees!";
  },

  function() {
    echo "You got a toy car!";
  },

  function() {
    echo "You got some balloons!";
  }
);
Once you’ve done that, your code can decide which function to call at runtime. For example, it could call a function at random:

// Call a random function
$choice = rand( 0, 2 );
$luckyDip[$choice]();

```

** Using anonymous functions as callbacks **
```
One common use of anonymous functions is to create simple inline callback functions. A callback function is a function that you create yourself, then pass to another function as an argument. Once it has access to your callback function, the receiving function can then call it whenever it needs to. This gives you an easy way to customise the behaviour of the receiving function.

Many built-in PHP functions accept callbacks, and you can also write your own callback-accepting functions. Let’s look at a couple of built-in functions that use callbacks, and see how to use them.

Using array_map() to run a callback function on each element in an array
PHP’s array_map() function accepts a callback function and an array as arguments. It then walks through the elements in the array. For each element, it calls your callback function with the element’s value, and your callback function needs to return the new value to use for the element. array_map() then replaces the element’s value with your callback’s return value. Once it’s done, array_map() returns the modified array.

array_map() works on a copy of the array you pass to it. The original array is untouched.

Here’s how you might use array_map() with a regular callback function:

// Create a regular callback function...
function nameToGreeting( $name ) {
  return "Hello " . ucfirst( $name ) . "!";
}

// ...then map the callback function to elements in an array.
$names = array( "fred", "mary", "sally" );
print_r( array_map( nameToGreeting, $names ) );
This code creates a regular function, nameToGreeting(), that takes a string, $name, uppercases the first letter, prepends "Hello ", and returns the result. Then, on line 8, the code passes this callback function to array_map(), along with an array of names to work with, and displays the result:


Array ( [0] => Hello Fred! [1] => Hello Mary! [2] => Hello Sally! )
While this code works, it’s a bit cumbersome to create a separate regular function just to act as a simple callback like this. Instead, we can create our callback as an inline anonymous function at the time we call array_map(), as follows:

// A neater way:
// Map an anonymous callback function to elements in an array.
print_r ( array_map( function( $name ) {
  return "Hello " . ucfirst( $name ) . "!";
}, $names ) );
This approach saves a line of code, but more importantly, it avoids cluttering up the PHP file with a separate regular function that is only being used as a one-off callback.

```


```
Creating closures with anonymous functions
Megaphone
Another common use of anonymous functions is to create closures. A closure is a function that retains access to the variables in its enclosing scope, even if that scope has since disappeared.

For example:

A function, myFunction(), contains a local variable (or parameter) called $myVar.
The function also defines and returns an anonymous function that accesses $myVar.
Some other code calls myFunction() and gets back the anonymous function, which it stores in $anonFunction. By this time, myFunction() has, of course, finished running.
If the code now calls $anonFunction(), the anonymous function can still access the $myVar local variable that was in myFunction(), even though myFunction() is no longer running! The anonymous function, together with its reference to the $myVar variable, constitute a closure.
Rather confusingly, the PHP manual refers to anonymous functions as closures. They are not the same thing! Anonymous functions are used to create closures.

Closures can be difficult to get your head around at first, but once you grasp the concept, they let you write clean, powerful and flexible code. Let’s look at a couple of examples of closures to make things clearer.

A simple closure
We’ll start by creating a very simple closure using an anonymous function:

// A simple example of a closure

function getGreetingFunction() {

  $timeOfDay = "morning";

  return ( function( $name ) use ( &$timeOfDay ) {
    $timeOfDay = ucfirst( $timeOfDay ); 
    return ( "Good $timeOfDay, $name!" );
  } );
};

$greetingFunction = getGreetingFunction();
echo $greetingFunction( "Fred" ); // Displays "Good Morning, Fred!"
Let’s walk through this code:

getGreetingFunction()
getGreetingFunction() initialises a local variable, $timeOfDay, on line 5, and on lines 7-10 it also defines and returns an anonymous function (described below).
The anonymous function
On line 8, the anonymous function manipulates getGreetingFunction()‘s local $timeOfDay variable by converting its first letter to uppercase, and on line 9 it returns a greeting string that contains $timeOfDay‘s value.
The use keyword
Normally, the anonymous function wouldn’t have access to the $timeOfDay variable, since that variable is local to getGreetingFunction()‘s scope only. However, the use keyword on line 7 tells PHP to let the anonymous function access $timeOfDay. This lets us create the closure.
The ampersand
The ampersand (&) before $timeOfDay tells PHP to pass a reference to the $timeOfDay variable into the anonymous function, rather than just copying the variable’s value. This allows the anonymous function to manipulate $timeOfDay directly. Strictly speaking, a closure’s function should always access variables in its enclosing scope by reference. That said, if you know that you won’t need to change the value of a variable then you can omit the ampersand to pass the variable by value instead.
Calling getGreetingFunction()
On line 13, we call getGreetingFunction() and get back the returned anonymous function, which we store in a $greetingFunction variable.
Note that, by this point, getGreetingFunction() has finished running. In normal circumstances, its local variable, $timeOfDay, would have fallen out of scope and disappeared. However, because we’ve created a closure using the anonymous function (now stored in $greetingFunction), the anonymous function can still access this $timeOfDay variable.

Calling the anonymous function
On line 14, we call our anonymous function. It manipulates the value of the $timeofDay variable inside the closure by converting its first letter to uppercase, then it returns a greeting containing $timeOfDay‘s new value, which is "Morning".
That, in a nutshell, is how you create a closure in PHP. It’s a trivial example, but the important point to note is that the returned anonymous function can still access its enclosing function’s $timeOfDay local variable, even after the enclosing function has finished running.

```
