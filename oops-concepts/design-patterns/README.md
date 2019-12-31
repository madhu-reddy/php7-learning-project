https://webmobtuts.com/backend-development/creating-classes-with-php-factory-abstract-factory-simple-and-static-factory-patterns/
```
Factories act as a way to create a new instance of specific class, in another way instead of handling the creation of the class by the client code some classes will be in charge of that and handles the creation process, all you have to do is to call that factory.
```
```
First Pattern: The Factory Method
The Factory pattern is one of the commonly used design patterns.
```
```
In it’s normal form is a class that can be instantiated and have a method that takes some parameters and creates a new instance based on these parameters, to understand how this is work let’s show an example:

 

Imagine that we have an interface for Geometrical shapes like Rectangle, Triangle, Circle, etc and have only one method draw that draws a shape according to position like this:
<?php
 
interface Shape{
    public function draw();
}
 
class Position{
    public $x;
    public $y;
}

Now let’s create a specific shape from this interface for example Rectangle as shown below:
class Rectangle implements Shape{
    private $position;
    
    public function __construct(Position $pos) {
        $this->position = $pos;
    }
    
    public function draw(){
        echo "Drawing a rectangle with position (".$this->position->x .",".$this->position->y.")<br/>";
    }
}

As shown in the code above we implemented the Shape interface and typehint the constructor with the Position parameter through using dependency injection and finally implemented the concrete draw() method.

 
Now to create an instance of the class we can do something like this:

<?php
$pos = new Position;
$pos->x = 34;
$pos->y = 55;
 
$rectangle = new Rectangle($pos);
 
$rectangle->draw();

```

```
But we can create a new instance in another way using the Factory method pattern as shown below:
<?php
class ShapeFactory{
    public function create($class, $position)
    {
        return new $class($position);
    }
}
 
$pos = new Position;
$pos->x = 34;
$pos->y = 55;
$shape = new ShapeFactory;
$rect = $shape->create("Rectangle", $pos);
var_dump($rect);

As shown above we created a new shape factory class and has a method that takes the class name as a string and returns a new instance of that class. This method is called the creator.

Now you can create Circle and Triangle classes the same way as Rectangle as shown in the following code:

<?php
class Circle implements Shape{
    private $position;
    
    public function __construct(Position $pos) {
        $this->position = $pos;
    }
    
    public function draw(){
        echo "Drawing a circle with position (".$this->position->x .",".$this->position->y.")<br/>";
    }
}
 
class Triangle implements Shape{
    private $position;
    
    public function __construct(Position $pos) {
        $this->position = $pos;
    }
    
    public function draw(){
        echo "Drawing a triangle with position (".$this->position->x .",".$this->position->y.")<br/>";
    }
}
 
 
// client code
$pos = new Position;
 
$shape = new ShapeFactory;
 
$pos->x = 100;
$pos->y = 20;
 
// create circle instance
$circle = $shape->create("Circle", $pos);
var_dump($circle);
$circle->draw();
 
$pos->x = 110;
$pos->y = 50;
 
// create triangle instance
$triangle = $shape->create("Triangle", $pos);
var_dump($triangle);
$triangle->draw();


As you see the advantage of this approach is that you don’t have to remember each class and how it’s instantiated, just give the class name to the creator and the creator gives you the instance.

```
```
``` Factory Pattern```
``` 
If you are using large chunk of if/else or switch statement in your code to create instances of similar classes. You may have seen the problem, which is every time when you introduce a new class, you will have to add more conditions to the statement. And when you make a simple change to one class's constructor, you will need to go through each condition to make sure everything is changed accordingly. Especially in a team development environment, it may cause extra development and testing efforts.
Factory pattern provides a simple interface for external codes to acquire an instance of a class. It makes code much easier to maintain and test.
In the scenario below, $apiObject is assigned different objects based on $type variable.

$apiObject = null;
switch($type){
 case 'twitter':
   $apiObject = new TwitterApi();
   break;
 
 case 'facebook':
   $apiObject = new FacebookApi();
   break;
    
 case 'google':
   $apiObject = new GoogleApi();
   break;
   
 default:
   break;
}  
When instantiation of a class requires logic to determine, we can use Factory pattern. Thanks to PHP's ability to create a new instance of a class using a variable, we can implement a Factory class as below:

class SocialFactory
{
    //1
    public static function create($type)
    {
        //2
        $class = ucfirst($type).'Api';
         
        //3
        return new $class;
    }  
}
The function used to create class instance is called Factory method. It is function create ($type) in this example, and we make it static, so we can call it using Class:: operator.
Format the class name. In this example, make the first character of $type capitalized and append 'Api'to it.
Finally we return the object by calling new $class. This is the feature mentioned above: dynamically creating object using a string variable.
Instead of long lines of switch statement, now you can call SocialFactory to create the object for you:

$apiObject = SocialApi::create($type) ;

In the old code you will need to add one more condition to the switch statement. With Factory pattern, you can actually keep the main code untouched. This becomes extremely useful in a team development environment. Individual developer can focus on his own tasks instead of worrying about the changes in the main code.
```
