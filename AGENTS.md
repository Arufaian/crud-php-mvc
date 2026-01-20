# Agent Guidelines for CRUD System

This document provides essential information for agentic coding agents working on this PHP CRUD system project.

## Project Overview

A simple PHP-based CRUD (Create, Read, Update, Delete) system managing users through a Docker-based XAMPP environment. Architecture follows MVC pattern with controllers, models, views, and database configuration separated into distinct directories.

## Build, Lint & Test Commands

### Running the Application
```bash
# Start the XAMPP/Docker environment
docker-compose up -d

# Access the application
# Browser: http://localhost/crud_system/
```

### Database Setup
```bash
# Initialize database schema
mysql -h db -u root -proot < database.sql
```

### Code Quality
```bash
# Currently no linting setup - PHP_CodeSniffer recommended
php -l <file.php>  # Syntax check individual file

# Future: Add PHPStan for static analysis
# Future: Add PHPUnit for unit tests
```

### Running Tests
```bash
# Currently no test suite implemented
# Recommended: PHPUnit for unit testing
# Recommended: Integration tests for database operations
```

## Directory Structure

```
├── config/
│   └── Database.php          # Singleton database connection
├── controllers/
│   └── UserController.php    # Request routing and business logic
├── models/
│   └── User.php              # Database operations (User entity)
├── views/
│   ├── index.php             # List users view
│   ├── create.php            # Create user form view
│   └── edit.php              # Edit user form view
├── index.php                 # Router and entry point
├── database.sql              # Database schema
└── AGENTS.md                 # This file
```

## Code Style Guidelines

### Imports and Requirements
- Use `require_once` for dependencies to prevent double loading
- Import dependencies at the top of files: `require_once __DIR__ . '/../path/to/File.php';`
- Use relative paths with `__DIR__` for path resolution
- Example: `require_once __DIR__ . '/../config/Database.php';`

### Formatting
- Use spaces for indentation (4 spaces per level)
- Line length: Keep under 100 characters where practical
- Place opening brace on same line as declaration: `public function name() {`
- Closing brace on separate line at same indentation level
- No trailing whitespace
- One blank line between methods

### Naming Conventions
- **Classes**: PascalCase (UserController, Database, User)
- **Methods**: camelCase (getAll, create, edit, delete)
- **Properties**: camelCase with private/public visibility (private $userModel)
- **Constants**: UPPER_SNAKE_CASE
- **Variables**: camelCase (userId, userName)
- Use descriptive names: prefer `getUserById()` over `getUser()`

### Type Hints & Documentation
- Add type hints for method parameters where possible: `public function edit($id)`
- Document complex methods with PHPDoc comments
- Include return types in PHPDoc: `@return bool` or `@return array`
- Use `@param` for parameters in complex methods

### Error Handling
- Use try-catch blocks for database operations (Database.php model)
- Redirect on errors or missing resources (UserController.php:34-36)
- Validate user input before database operations
- Use PDO with bound parameters to prevent SQL injection
- Catch PDOException for database errors: `catch (PDOException $e)`
- Log errors appropriately (future: implement proper logging)

### Database Operations
- Use prepared statements with bound parameters
- Bind integers with `PDO::PARAM_INT` for type safety
- Use `bindParam()` for prepared statements
- Return operation result directly from execute(): `return $stmt->execute();`
- Use PDO::FETCH_ASSOC for array results

### Controllers
- Inject dependencies via constructor (UserController:9-10)
- Method pattern: Handle POST for mutations, GET for display
- Check REQUEST_METHOD to differentiate HTTP verbs
- Redirect after successful mutations
- Load views with `require_once`

### Models
- Encapsulate database logic
- Private property for PDO connection: `private $pdo;`
- Get database connection from Database class in constructor
- Use parameterized queries for all user input
- Return data as associative arrays (PDO::FETCH_ASSOC)

## Common Patterns

### Database Queries
```php
$stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetch();
```

### Controller Method Structure
```php
public function methodName($param) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['field'] ?? '';
        if ($this->model->action($data)) {
            header('Location: index.php?action=index');
            exit();
        }
    }
    require_once __DIR__ . '/../views/view.php';
}
```

### Routing in index.php
```php
$action = $_GET['action'] ?? 'index';
$controller = new UserController();
switch ($action) {
    case 'name':
        $controller->method();
        break;
}
```

## Important Notes for Agents

- This is a simple educational CRUD application without framework dependencies
- No type declarations or strict_types (for PHP 5.x compatibility)
- Database credentials are hardcoded (config/Database.php:8-11) - use env variables in production
- No authentication or authorization implemented
- No input sanitization beyond null coalescing (add htmlspecialchars for output)
- Limited error handling (improve with proper logging)
- Always use PDO with prepared statements to prevent SQL injection
- Test database operations thoroughly before deployment
- Follow the singleton pattern for database connection (Database.php:4, 22-27)
