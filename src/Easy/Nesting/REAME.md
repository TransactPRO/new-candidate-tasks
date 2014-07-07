# Easy/Nesting
Given string that contain parentheses. Your goal - check that all parentheses are properly nested.

Rules:
- String can be in any format.
- String can be empty.
- Only `(` and `)` count as parentheses and must be properly nested.

String is properly nested, if:
- String is empty
- String doesn't contain any parentheses
- All `()` parentheses are correctly nested.

Correctly nested string examples:
- `"Hello (world)"`
- `"Hello world"`
- `""`
- `"()"`
- `"()()()()"`
- `"(((())))"`
- `"(((i)()))e"`

Invalid string examples:
- `"Hello (world"`
- `"(((((((((("`
- `"(()[)"`
- `"(((i(()))e"`

**Complete a `check` function in class `Nesting`.**

To check if your solution is correct, run:
```shell
vendor/bin/phpunit Easy/Nesting
```

**Note:** Be sure to keep your solution as more efficient, as possible. Also, try to keep your code structured and easy-to-read.
