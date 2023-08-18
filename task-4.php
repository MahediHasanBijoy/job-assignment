<?php

// **Task 4: Polymorphism**
// Build a set of animal classes that demonstrate polymorphism by overriding a method for making sounds.

class Animal {
    public function makeSound() {
        return "Animal makes sound";
    }
}

class Dog extends Animal {
    // method overriding
    public function makeSound() {
        return "Dog says Woof woof!";
    }
}

class Cat extends Animal {
    // method overriding
    public function makeSound() {
        return "Cat says Meow meow!";
    }
}

class Cow extends Animal {
    // method overriding
    public function makeSound() {
        return "Cow says Hamba Hamba!";
    }
}

// Array of different animal objects
$animals = [
    new Dog(),
    new Cat(),
    new Cow(),
];

foreach ($animals as $animal) {
    echo $animal->makeSound() . PHP_EOL;
}
