```
So far, you have learned that extending from classes allows you to inherit code (properties and method implementations), but it has the limitation of extending only from one class each time. On the other hand, you can use interfaces to implement multiple behaviors from the same class, but you cannot inherit code in this way. To fill this gap, that is, to be able to inherit code from multiple places, you have traits.
```
```
A class in PHP can only have single inheritance. Traits are there to solve the problem.
```
```
Traits are mechanisms that allow you to reuse code, "inheriting", or rather copy-pasting code, from multiple sources at the same time. Traits, as abstract classes or interfaces, cannot be instantiated; they are just containers of functionality that can be used from other classes.
```
