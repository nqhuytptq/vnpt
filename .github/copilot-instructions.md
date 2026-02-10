# Copilot Instructions for VNPT Codebase

## Project Overview
This is a **PHP learning/practice repository** for studying algorithms, data structures, and object-oriented programming (OOP) concepts. It's a collection of algorithm implementations and OOP examples running on XAMPP/PHP without external dependencies.

## Architecture & Directory Structure

```
vnpt/
├── OOP/                 # Object-oriented programming examples
│   ├── index.php       # Instantiation demo (Student, Teacher classes)
│   ├── student.php     # Student class with id, name, age properties
│   └── teacher.php     # Teacher class (mirrors Student structure)
├── Algorithms/         # Algorithm implementations
│   ├── Sort/          # Sorting algorithms (bubble sort, insertion sort)
│   └── Search/        # Search algorithms (placeholder)
├── DS/                # Data structures (currently empty)
└── [root scripts]     # Utility/practice functions
    ├── 1.php          # gradingStudents() algorithm function
    └── index.php      # Array math functions (plusMinus())
```

## Key Patterns & Conventions

### OOP Pattern (Student/Teacher Example)
- **Simple class structure**: No inheritance or interfaces yet. Classes use public properties directly.
- **Naming convention**: Methods use snake_case (e.g., `set_student()`, `get_student()`)
- **Output format**: Use `echo` with string concatenation for console output (Vietnamese labels: "Ma SV" = Student ID, "Ten" = Name, "Tuoi" = Age)
- **Example**: See [OOP/student.php](OOP/student.php) for class structure

### Algorithm Pattern
- **Standalone functions**: Algorithms are defined as functions, not class methods (e.g., `bubbleSort()`, `plusMinus()`)
- **Array-based**: Work primarily with PHP arrays
- **Direct return values**: Functions return processed data or results directly
- **Testing pattern**: Arrays defined inline below function; functions called with `echo` for output (see [Algorithms/Sort/bubbleSort.php](Algorithms/Sort/bubbleSort.php))

### Execution Context
- **Runtime**: PHP CLI via XAMPP (invoked with `php filename.php`)
- **No external libraries**: Pure PHP implementations only
- **No database**: In-memory data structures and arrays
- **Output via echo**: All results printed to console using `echo` statements

## Common Development Tasks

### Running Algorithm Examples
```bash
php 1.php                                  # Run gradingStudents algorithm
php Algorithms/Sort/bubbleSort.php        # Run bubble sort
```

### Adding New Algorithms
1. Create file in appropriate `Algorithms/[Category]/filename.php`
2. Define function at module level (not in class)
3. Add test array and `echo` output at end of file
4. Test with: `php Algorithms/[Category]/filename.php`

### Adding New OOP Classes
1. Create new file in `OOP/classname.php`
2. Follow Student/Teacher pattern: public properties + setter/getter methods
3. Import in `OOP/index.php` with `include()`
4. Instantiate and test in index.php

## Important Notes
- **Vietnamese Labels**: Properties and output use Vietnamese terminology (see [OOP/student.php](OOP/student.php#L13) for output format)
- **Simple OOP**: No constructors, inheritance, or access modifiers (private/protected) yet
- **Manual memory management**: Arrays passed by value; no object references or deep copying patterns
- **Incomplete sections**: `DS/` directory and `Algorithms/Search/` are placeholders for future additions

## When Modifying Code
- Maintain consistent naming: snake_case for methods, camelCase for variables
- Keep OOP classes simple (no complex patterns)
- Add test data directly in algorithm files for verification
- Use `echo` with newlines (`\n`) for readable console output
