<?php  
 /*
  * An interface is an OOP element that groups a set of function declarations without implementing them, that is, it specifies the name, return type, and arguments, but not the block of code. Interfaces are different from abstract classes, since they cannot contain any implementation at all, whereas abstract classes could mix both method definitions and implemented ones. The purpose of interfaces is to state what a class can do, but not how it is done.*/ 
//https://www.geeksforgeeks.org/php-interface/
interface MyInterfaceName{ 
  
    public function method1(); 
    public function method2(); 
  
} 
  
class MyClassName implements MyInterfaceName{ 
  
    public function method1(){ 
        echo "Method1 Called" . "\n"; 
    } 
  
    public function method2(){ 
        echo "Method2 Called". "\n"; 
    } 
}  
  
$obj = new MyClassName; 
$obj->method1(); 
$obj->method2(); 
  
?> 
