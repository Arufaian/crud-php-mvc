# PHP MVC CRUD System - Developer Handbook

## Table of Contents
1. [Architecture Overview](#architecture-overview)
2. [Directory Structure](#directory-structure)
3. [Key Components](#key-components)
4. [Request Lifecycle](#request-lifecycle)
5. [Implementation Guide: Adding a New Master Data](#implementation-guide-adding-a-new-master-data)
6. [Best Practices](#best-practices)
7. [Common Patterns](#common-patterns)

---

## Architecture Overview

This project implements a simplified **Model-View-Controller (MVC)** architecture for managing data through a user-friendly web interface. The system is built on PHP with a MySQL database backend, utilizing PDO for database operations.

### Core Principles

- **Separation of Concerns**: Business logic (Models), request handling (Controllers), and presentation (Views) are strictly separated.
- **DRY (Don't Repeat Yourself)**: Layout components (Header, Sidebar, Footer) are reused across all pages to eliminate duplication.
- **Scalability**: The architecture supports adding new modules (e.g., Products, Categories) following established patterns.
- **Security**: Prepared statements and bound parameters prevent SQL injection attacks.

---

## Directory Structure

```
crud_system/
├── config/
│   └── Database.php              # Singleton database connection class
├── controllers/
│   └── UserController.php        # Request routing and business logic for users
├── lib/
│   └── Router.php                # Dynamic URL routing and controller dispatching
├── models/
│   └── User.php                  # Database operations for users entity
├── views/
│   ├── layouts/
│   │   ├── header.php            # HTML head, navbar (reusable)
│   │   ├── sidebar.php           # Navigation menu (reusable)
│   │   └── footer.php            # Footer and scripts (reusable)
│   ├── user/
│   │   ├── index.php             # List all users
│   │   ├── create.php            # Create user form
│   │   └── edit.php              # Edit user form
│   └── dashboard/
│       └── index.php             # Home/dashboard page
├── assets/
│   ├── css/
│   │   └── styles.css            # Custom CSS styles
│   └── js/
│       └── resize.js             # Client-side JavaScript utilities
├── index.php                     # Entry point and routing dispatcher
├── database.sql                  # Database schema and initial setup
├── AGENTS.md                     # Agent guidelines for the project
└── DEVELOPER_HANDBOOK.md         # This file
```

### Folder Descriptions

#### `/config`
- **Purpose**: Contains configuration files for the application.
- **Key File**: `Database.php` implements the Singleton pattern for database connections.

#### `/controllers`
- **Purpose**: Handles HTTP requests and orchestrates Model-View interactions.
- **Naming**: `{Entity}Controller.php` (e.g., `UserController.php`, `ProductController.php`)
- **Responsibility**: Process form submissions, fetch data from models, load appropriate views.

#### `/lib`
- **Purpose**: Contains reusable classes and utilities.
- **Key File**: `Router.php` dynamically routes URLs to controllers and actions.

#### `/models`
- **Purpose**: Encapsulates all database operations for specific entities.
- **Naming**: `{Entity}.php` (e.g., `User.php`, `Product.php`)
- **Responsibility**: CRUD operations, data validation, database queries.

#### `/views`
- **Purpose**: Contains the presentation layer (HTML templates).
- **Structure**:
  - `layouts/`: Reusable layout components (Header, Sidebar, Footer)
  - `{entity}/`: Entity-specific views (e.g., `user/`, `product/`)
    - `index.php`: List/view all records
    - `create.php`: Create new record form
    - `edit.php`: Edit existing record form

#### `/assets`
- **Purpose**: Static files (CSS, JavaScript, images).
- **Organization**:
  - `css/`: Stylesheets
  - `js/`: Client-side scripts

---

## Key Components

### 1. Database Configuration (Singleton Pattern)

**File**: `config/Database.php`

The `Database` class implements the Singleton pattern to ensure a single database connection throughout the application lifecycle.

```php
<?php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'db';
        $dbname = 'crud_system';
        $username = 'root';
        $password = 'root';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }

    public static function getConnection() {
        return self::getInstance();
    }
}
```

**Why Singleton?**
- Prevents multiple database connections.
- Ensures consistent state across the application.
- Reduces memory overhead.

---

### 2. Dynamic Router

**File**: `lib/Router.php`

The `Router` class parses URL parameters and dynamically dispatches requests to the appropriate Controller and Action.

**URL Format**: `index.php?controller={entity}&action={method}&id={id}`

**Examples**:
- `index.php?controller=user&action=index` → UserController::index()
- `index.php?controller=user&action=create` → UserController::create()
- `index.php?controller=user&action=edit&id=5` → UserController::edit(5)
- `index.php?controller=product&action=delete&id=3` → ProductController::delete(3)

**How It Works**:
1. **Parse URL**: Extracts `controller`, `action`, and `id` parameters.
2. **Construct Class Name**: Converts `controller=user` → `UserController`.
3. **Load Controller**: Dynamically includes and instantiates the controller class.
4. **Call Action**: Invokes the action method with parameters if needed.
5. **Error Handling**: Redirects to home if controller or action doesn't exist.

**Key Methods**:

- `route()`: Main method that processes the request.
- `getController()`: Returns the controller class name.
- `getAction()`: Returns the action method name.
- `getParams()`: Returns URL parameters.
- `getCurrentRoute()`: Static method for views to determine current page.
- `isActive($action, $controller = null)`: Static method to highlight active menu items.

---

### 3. Layout System (DRY Approach)

The layout system follows the **DRY (Don't Repeat Yourself)** principle by extracting common HTML components into reusable files.

#### Layout Files

**`views/layouts/header.php`**
- Contains: `<!DOCTYPE>`, `<html>`, `<head>`, `<body>` opening tag, navbar.
- Loaded first in every view using `require_once`.

**`views/layouts/sidebar.php`**
- Contains: Navigation menu with responsive design (desktop sidebar + mobile offcanvas).
- Includes active menu highlighting using `Router::isActive()`.

**`views/layouts/footer.php`**
- Contains: Closing tags for `</main>`, `</div>`, `</body>`, `</html>`.
- Includes Bootstrap JS bundle and custom scripts.

#### How Views Use Layouts

Each entity-specific view (e.g., `views/user/index.php`) includes layouts in this order:

```php
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<!-- Main Content Area -->
<main id="mainContent" class="main-content flex-grow-1" role="main">
    <div class="content-wrapper">
        <!-- Page-specific content here -->
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
```

**Benefits**:
- Update navbar/sidebar/footer in one place, affects all pages.
- Consistent design across the application.
- Easier maintenance and CSS/JS modifications.

---

## Request Lifecycle

This section explains how a URL travels through the system using the example: `index.php?controller=user&action=edit&id=1`

### Step 1: User Request

A user clicks a link or submits a form:
```html
<a href="index.php?controller=user&action=edit&id=1">Edit User</a>
```

### Step 2: Entry Point (index.php)

The browser requests `index.php` with query parameters.

```php
<?php

require_once __DIR__ . '/lib/Router.php';

// Initialize and route the request
$router = new Router();
$router->route();
```

**What happens**:
1. Includes `Router.php`.
2. Creates a new Router instance.
3. Calls `route()` to dispatch the request.

### Step 3: Router Parses URL (lib/Router.php)

The Router constructor (`__construct()`) is called automatically:

```php
public function __construct() {
    $this->controllerPath = __DIR__ . '/../controllers/';
    $this->parseUrl();
}

private function parseUrl() {
    // Extract controller parameter and convert to class name
    $rawController = $_GET['controller'] ?? 'user';
    $this->controller = ucfirst(strtolower($rawController)) . 'Controller';
    // Result: 'user' → 'UserController'

    // Extract action parameter
    $this->action = $_GET['action'] ?? $this->defaultAction;
    // Result: 'edit'

    // Store all parameters
    $this->params = $_GET;
    // Result: ['controller' => 'user', 'action' => 'edit', 'id' => '1']
}
```

**After parsing**:
- `$this->controller` = `'UserController'`
- `$this->action` = `'edit'`
- `$this->params` = `['controller' => 'user', 'action' => 'edit', 'id' => '1']`

### Step 4: Router Dispatches Request

The `route()` method:

```php
public function route() {
    // Load the controller
    $controller = $this->loadController();
    
    if ($controller === null) {
        $this->handleError(404, "Controller '{$this->controller}' not found.");
        return;
    }
    
    // Check if the action method exists
    if (!$this->methodExists($controller)) {
        $this->handleError(404, "Action '{$this->action}' not found in {$this->controller}.");
        return;
    }
    
    // Call the action method with parameters if needed
    $action = $this->action;
    
    if ($this->needsId($action)) {
        $id = $this->params['id'] ?? null;
        if (!$id) {
            header('Location: index.php?action=users');
            exit();
        }
        $controller->$action($id);  // Pass ID parameter
    } else {
        $controller->$action();
    }
}
```

**What happens**:
1. Loads `controllers/UserController.php`.
2. Instantiates the `UserController` class.
3. Checks if `edit()` method exists.
4. Determines that `edit` requires an ID parameter.
5. Calls `$controller->edit(1)` with the ID.

### Step 5: Controller Processes Request (controllers/UserController.php)

The controller interacts with the model and loads the view:

```php
public function edit($id) {
    // 1. Get data from model
    $user = $this->userModel->getById($id);

    if (!$user) {
        header('Location: index.php?action=users');
        exit();
    }

    // 2. Handle form submission (POST request)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        // 3. Update data via model
        if ($this->userModel->update($id, $name, $email)) {
            // 4. Redirect on success
            header('Location: index.php?action=users');
            exit();
        }
    }

    // 5. Load and render the view
    require_once __DIR__ . '/../views/user/edit.php';
}
```

**Controller responsibilities**:
1. Fetch data from the model based on URL parameters.
2. Validate that requested resource exists.
3. Handle form submissions.
4. Redirect on success/failure.
5. Pass data to view via `$user` variable.

### Step 6: View Renders HTML (views/user/edit.php)

The view assembles the final HTML using layouts:

```php
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<main id="mainContent" class="main-content flex-grow-1" role="main">
    <div class="content-wrapper">
        <div class="page-header mb-4">
            <h1 class="h3 mb-1">Edit User</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="index.php?action=edit&id=<?php echo $user['id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="index.php?action=users" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
```

**View responsibilities**:
1. Include layout files (header, sidebar, footer).
2. Display data passed by controller.
3. Render forms and interactive elements.
4. Use `htmlspecialchars()` to prevent XSS attacks.
5. Generate correct URLs using the Router URL format.

### Step 7: Browser Receives HTML

The browser renders the complete HTML page:
- Header with navbar
- Sidebar with navigation
- Main content area with edit form
- Footer with scripts

---

## Implementation Guide: Adding a New Master Data

This is the most important section. Follow these steps to add a new module (e.g., "Products") to the system.

### Overview

Adding a new master data module requires creating files in five layers:
1. Database (SQL)
2. Model (PHP class)
3. Controller (PHP class)
4. Views (HTML templates)
5. Navigation (Update sidebar)

---

### Step 1: Database Schema

**File**: `database.sql` (add to existing file)

Create the table for your new entity.

```sql
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

**Important**:
- Use consistent naming: `{entity}_id` for primary keys, `created_at`, `updated_at` for timestamps.
- Add `NOT NULL` constraints for required fields.
- Use appropriate data types (VARCHAR, INT, DECIMAL, TEXT, TIMESTAMP).
- Add `UNIQUE` constraints for email-like fields.

**Run the migration**:
```bash
mysql -h db -u root -proot < database.sql
```

---

### Step 2: Create the Model

**File**: `models/Product.php`

The model encapsulates all database operations for the entity.

```php
<?php

require_once __DIR__ . '/../config/Database.php';

class Product {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get all products
     * @return array List of products
     */
    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Get a product by ID
     * @param int $id Product ID
     * @return array|null Product data or null if not found
     */
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Create a new product
     * @param string $name Product name
     * @param string $description Product description
     * @param float $price Product price
     * @param int $stock Stock quantity
     * @return bool True if successful
     */
    public function create($name, $description, $price, $stock) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, description, price, stock) 
             VALUES (:name, :description, :price, :stock)"
        );
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Update a product
     * @param int $id Product ID
     * @param string $name Product name
     * @param string $description Product description
     * @param float $price Product price
     * @param int $stock Stock quantity
     * @return bool True if successful
     */
    public function update($id, $name, $description, $price, $stock) {
        $stmt = $this->pdo->prepare(
            "UPDATE products 
             SET name = :name, description = :description, price = :price, stock = :stock 
             WHERE id = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Delete a product
     * @param int $id Product ID
     * @return bool True if successful
     */
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
```

**Model Guidelines**:
- Use `require_once` to import dependencies at the top.
- Initialize the PDO connection in `__construct()`.
- Use prepared statements with bound parameters for all database queries.
- Use `PDO::PARAM_INT` for integer parameters.
- Return `fetchAll()` for multiple records, `fetch()` for single records.
- Add PHPDoc comments for all public methods.

---

### Step 3: Create the Controller

**File**: `controllers/ProductController.php`

The controller orchestrates the request flow between Router, Model, and Views.

```php
<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    /**
     * Display list of all products
     */
    public function index() {
        $products = $this->productModel->getAll();
        require_once __DIR__ . '/../views/product/index.php';
    }

    /**
     * Display form to create a new product
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $stock = $_POST['stock'] ?? '';

            // Validate input
            if (!empty($name) && !empty($price)) {
                if ($this->productModel->create($name, $description, $price, $stock)) {
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
            }
        }
        require_once __DIR__ . '/../views/product/create.php';
    }

    /**
     * Display form to edit a product
     * @param int $id Product ID
     */
    public function edit($id) {
        $product = $this->productModel->getById($id);

        if (!$product) {
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $stock = $_POST['stock'] ?? '';

            if (!empty($name) && !empty($price)) {
                if ($this->productModel->update($id, $name, $description, $price, $stock)) {
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
            }
        }
        require_once __DIR__ . '/../views/product/edit.php';
    }

    /**
     * Delete a product
     * @param int $id Product ID
     */
    public function delete($id) {
        if ($this->productModel->delete($id)) {
            header('Location: index.php?controller=product&action=index');
            exit();
        }
    }
}
```

**Controller Guidelines**:
- **Naming Convention**: `{Entity}Controller` (e.g., `ProductController`)
- **Constructor**: Inject dependencies (models) in constructor.
- **Action Methods**: One method per URL action (`index`, `create`, `edit`, `delete`).
- **POST Handling**: Check `$_SERVER['REQUEST_METHOD'] === 'POST'` to distinguish form submissions.
- **Redirects**: Use `header('Location: ...')` followed by `exit()` after mutations.
- **View Loading**: Use `require_once` to load the appropriate view file.
- **Data Passing**: Variables assigned in controller are accessible in views (`$products`, `$product`).

---

### Step 4: Create Views

Create a new folder for your entity's views: `views/product/`

#### 4.1 Index View (List All Products)

**File**: `views/product/index.php`

```php
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<main id="mainContent" class="main-content flex-grow-1" role="main">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h3 mb-1">Product Management</h1>
                    <p class="text-muted mb-0">Manage and view all products in the system.</p>
                </div>
                <div class="col-auto">
                    <a href="index.php?controller=product&action=create" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-2"></i>Add New Product
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Created At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <p class="text-muted mb-2">No products found</p>
                                        <a href="index.php?controller=product&action=create" class="btn btn-sm btn-primary">
                                            <i class="bi bi-plus-circle me-1"></i>Add First Product
                                        </a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><strong><?php echo htmlspecialchars($product['id']); ?></strong></td>
                                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                                        <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                                        <td><?php echo htmlspecialchars($product['stock']); ?></td>
                                        <td><?php echo htmlspecialchars($product['created_at']); ?></td>
                                        <td class="text-center">
                                            <a href="index.php?controller=product&action=edit&id=<?php echo $product['id']; ?>" 
                                               class="btn btn-warning btn-sm" title="Edit product">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Are you sure you want to delete this product?');" 
                                               title="Delete product">
                                                <i class="bi bi-trash3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
```

**Important Points**:
- Always include header and sidebar at the top.
- Always include footer at the bottom.
- Use correct URL format: `index.php?controller=product&action=...`
- Use `htmlspecialchars()` to escape output and prevent XSS.
- Use the variable passed by controller (`$products`).

#### 4.2 Create View (Form to Add Product)

**File**: `views/product/create.php`

```php
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<main id="mainContent" class="main-content flex-grow-1" role="main">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h3 mb-1">Add New Product</h1>
                    <p class="text-muted mb-0">Create a new product in the system.</p>
                </div>
                <div class="col-auto">
                    <a href="index.php?controller=product&action=index" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="index.php?controller=product&action=create">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="0" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Save
                                </button>
                                <a href="index.php?controller=product&action=index" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
```

#### 4.3 Edit View (Form to Update Product)

**File**: `views/product/edit.php`

```php
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<main id="mainContent" class="main-content flex-grow-1" role="main">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h3 mb-1">Edit Product</h1>
                    <p class="text-muted mb-0">Update product information.</p>
                </div>
                <div class="col-auto">
                    <a href="index.php?controller=product&action=index" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="index.php?controller=product&action=edit&id=<?php echo $product['id']; ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo htmlspecialchars($product['name']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($product['description']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" 
                                       value="<?php echo htmlspecialchars($product['price']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="stock" name="stock" 
                                       value="<?php echo htmlspecialchars($product['stock']); ?>" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Update
                                </button>
                                <a href="index.php?controller=product&action=index" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
```

---

### Step 5: Update Navigation

**File**: `views/layouts/sidebar.php`

Add a navigation link to your new module in the sidebar. Find the "Navigation Items" section and add a new link.

**For Desktop Sidebar** (around line 18):

```php
<a href="index.php?controller=product&action=index" class="nav-link <?php echo Router::isActive('index', 'product') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0">
    <i class="bi bi-box-seam"></i>
    <span>Products</span>
</a>
```

**For Mobile Sidebar** (around line 93):

```php
<a href="index.php?controller=product&action=index" class="nav-link <?php echo Router::isActive('index', 'product') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0 ps-3">
    <i class="bi bi-box-seam"></i>
    <span>Products</span>
</a>
```

**URL Format Breakdown**:
- `index.php` - Entry point
- `?controller=product` - Specifies ProductController
- `&action=index` - Calls the `index()` method

**Active Menu Highlighting**:
- `Router::isActive('index', 'product')` checks if current route is products/index
- Adds `active` class to highlight the menu item

---

## Best Practices

### 1. Security

**SQL Injection Prevention**
```php
// WRONG - Vulnerable to SQL injection
$stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = " . $_GET['id']);

// CORRECT - Uses prepared statements
$stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
```

**XSS Prevention**
```php
// WRONG - Outputs user input directly
<td><?php echo $user['name']; ?></td>

// CORRECT - Escapes HTML special characters
<td><?php echo htmlspecialchars($user['name']); ?></td>
```

### 2. Naming Conventions

| Element | Convention | Example |
|---------|-----------|---------|
| Classes | PascalCase | `UserController`, `Product` |
| Methods | camelCase | `getAll()`, `getById()`, `create()` |
| Properties | camelCase | `$userModel`, `$pdo` |
| Database Tables | lowercase_plural | `users`, `products` |
| Database Columns | snake_case | `user_id`, `created_at` |

### 3. Code Organization

- **One class per file**: `Product.php` contains only the `Product` class.
- **Clear file structure**: Group related files (models, controllers, views) by entity.
- **Consistent spacing**: 4 spaces for indentation.
- **Comments**: Add PHPDoc comments to public methods.

### 4. View Best Practices

- Always include `header.php` before sidebar.
- Always include `footer.php` at the end.
- Use `htmlspecialchars()` for all user-displayed data.
- Use correct URL format: `index.php?controller=entity&action=method&id=123`
- Keep views focused on presentation, not business logic.

---

## Common Patterns

### Pattern 1: CRUD Operations

A typical CRUD module has four methods:

```php
// List all records
public function index() {
    $records = $this->model->getAll();
    require_once __DIR__ . '/../views/{entity}/index.php';
}

// Show form and handle creation
public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        if ($this->model->create($name)) {
            header('Location: index.php?controller={entity}&action=index');
            exit();
        }
    }
    require_once __DIR__ . '/../views/{entity}/create.php';
}

// Show form and handle update
public function edit($id) {
    $record = $this->model->getById($id);
    if (!$record) {
        header('Location: index.php?controller={entity}&action=index');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        if ($this->model->update($id, $name)) {
            header('Location: index.php?controller={entity}&action=index');
            exit();
        }
    }
    require_once __DIR__ . '/../views/{entity}/edit.php';
}

// Handle deletion
public function delete($id) {
    if ($this->model->delete($id)) {
        header('Location: index.php?controller={entity}&action=index');
        exit();
    }
}
```

### Pattern 2: URL Generation

Always use the correct URL format when linking:

```php
// List all items
<a href="index.php?controller=product&action=index">All Products</a>

// Create new item
<a href="index.php?controller=product&action=create">Add Product</a>

// Edit specific item
<a href="index.php?controller=product&action=edit&id=<?php echo $product['id']; ?>">Edit</a>

// Delete specific item
<a href="index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>">Delete</a>
```

### Pattern 3: Menu Active State

Use `Router::isActive()` to highlight the current page in navigation:

```php
<!-- Check both controller and action -->
<a href="index.php?controller=product&action=index" 
   class="<?php echo Router::isActive('index', 'product') ? 'active' : ''; ?>">
    Products
</a>

<!-- Check action only (for backward compatibility) -->
<a href="index.php?action=users" 
   class="<?php echo Router::isActive('users') ? 'active' : ''; ?>">
    Users
</a>
```

### Pattern 4: Form Handling in Controllers

```php
public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract POST data
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        // Validate
        if (!empty($name) && !empty($email)) {
            // Process
            if ($this->model->create($name, $email)) {
                // Redirect on success
                header('Location: index.php?controller=entity&action=index');
                exit();
            }
        }
    }

    // Load form view (GET request or validation failed)
    require_once __DIR__ . '/../views/entity/create.php';
}
```

---

## Troubleshooting

### Controller Not Found

**Error**: "Controller 'ProductController' not found."

**Solution**: Ensure the controller file exists and is named correctly:
- File: `controllers/ProductController.php`
- Class: `class ProductController {`

### Action Not Found

**Error**: "Action 'index' not found in ProductController."

**Solution**: Ensure the action method exists in the controller:
```php
public function index() {
    // Method implementation
}
```

### Router Params Not Working

**Problem**: URL parameters are not being passed to the controller.

**Solution**: Check the URL format:
```php
// CORRECT format
index.php?controller=product&action=edit&id=5

// WRONG format (missing &id=)
index.php?controller=product&action=edit
```

### Database Connection Failed

**Error**: "Database connection failed: SQLSTATE[HY000] [2002]..."

**Solution**: Verify database credentials in `config/Database.php`:
```php
$host = 'db';           // Docker service name
$dbname = 'crud_system'; // Database name
$username = 'root';      // Database user
$password = 'root';      // Database password
```

---

## Conclusion

This handbook provides a complete guide to understanding and extending the PHP MVC CRUD system. By following the established patterns and best practices, you can quickly add new modules and maintain code consistency across the application.

For more information, refer to the `AGENTS.md` file for development guidelines and the inline code comments in each file for specific implementation details.
