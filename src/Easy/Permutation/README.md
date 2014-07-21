# Easy/Permutation
A non-empty array consisting of `N` integers is given.

A permutation is a sequence containing each element from 1 to `N` once, and only once. Examples:
```php
array(1, 2, 3, 4); // Correct (Permutation is 1,2,3,4)
array(1, 3, 2, 4); // Correct (Permutation is 1,2,3,4)
array(4, 3, 2, 1); // Correct (Permutation is 1,2,3,4)
array(3, 1, 4); // Invalid - 2 is missing (Permutation is 1,2,3)
```

**The goal is to check whether array A is a permutation.**

Complete a `check` function in class `Permutation`.

- Function accepts non-empty array.
- Function return `true` if array is a permutation, `false` otherwise.

To check if your solution is correct, run:
```shell
$ vendor/bin/phpunit --group Easy/Permutation
```

**Note:** Be sure to keep your solution as more efficient, as possible. Also, try to keep your code structured and easy-to-read.
