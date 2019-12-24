<?php

class Book {
    public $isbn;
    public $title;
    public $author;
    public $available;

    public function getCopy(): bool {
    if ($this->available < 1) {
        return false;
    } else {
        $this->available--;
        return true;
    }
    }
}

$book = new Book();
$book->title = "1984";
$book->author = "George Orwell";
$book->isbn = 9785267006323;
$book->available = 12;

if ($book->getCopy()) {
    echo 'Here, your copy.';
} else {
    echo 'I am afraid that book is not available.';
}


