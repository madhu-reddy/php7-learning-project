<?php
Trait Hello {
	public function hello() {
		echo "Hello";
	}
}
Trait World {
	public function world() {
		echo "World";
	}
}
class MyClass {
	use Hello, World;
}
$obj = new MyClass();
$obj -> hello();
$obj -> world();
