<?php
class Pops {
    public function sayHi() {
        echo "Hi, I am pops.";
    }
}

class Child extends Pops{
    public function sayHi() {
        echo "Hi, I am a child.";
    }
}

$pops = new Pops();
$child = new Child();
echo $pops->sayHi(); // Hi, I am pops.
echo $child->sayHi(); // Hi, I am Child.
