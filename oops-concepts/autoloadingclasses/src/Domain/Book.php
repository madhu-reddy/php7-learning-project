<?php

namespace Bookstore\Domain;
class Book {
    public $isbn;
    public $title;
    public $author;
    public $available;

    public function __construct(
       string $isbn,
       string $title,
       int $author,
       int $available
   ) {
       $this->isbn = $isbn;
       $this->title = $title;
       $this->author = $author;
       $this->available = $available;
   }

}
