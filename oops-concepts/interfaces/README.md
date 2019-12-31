```
So, why would someone use an interface if we could always use an abstract class that not only enforces the implementation of methods, but also allows inheriting code as well? The reason is that you can only extend from one class, but you can implement multiple instances at the same time.
```

```
An interface is an OOP element that groups a set of function declarations without implementing them, that is, it specifies the name, return type, and arguments, but not the block of code. Interfaces are different from abstract classes, since they cannot contain any implementation at all, whereas abstract classes could mix both method definitions and implemented ones. The purpose of interfaces is to state what a class can do, but not how it is done.
```
```
An Interface allows the users to create programs, specifying the public methods that a class must implement, without involving the complexities and details of how the particular methods are implemented. It is generally referred to as the next level of abstraction. It resembles the abstract methods, resembling the abstract classes. An Interface is defined just like a class is defined but with the class keyword replaced by the interface keyword and just the function prototypes. The interface contains no data variables. The interface is helpful in a way that it ensures to maintain a sort of metadata for all the methods a programmer wishes to work on.
```
```
Few characteristics of an Interface are:

An interface consists of methods that have no implementations, which means the interface methods are abstract methods.
All the methods in interfaces must have public visibility scope.
Interfaces are different from classes as the class can inherit from one class only whereas the class can implement one or more interfaces.
```
```
Concrete Class: The class which implements an interface is called the Concrete Class. It must implement all the methods defined in an interface. Interfaces of the same name can’t be implemented because of ambiguity error. Just like any class, an interface can be extended using the extends operator 
```
