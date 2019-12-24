<?php
class Pops {
    public function sayHi() {
        echo "Hi, I am pops.";
    }
}
class Child extends Pops{
    public function sayHi() {
        echo "Hi, I am a child.";
        parent::sayHi();
    }
}

$child = new Child();
echo $child->sayHi(); // Hi, I am Child. Hi I am pops.
