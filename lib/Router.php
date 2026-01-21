<?php

class Router {
    private $controller;
    private $action;
    private $params;
    private $controllerPath;
    private $defaultController = 'Petugas';
    private $defaultAction = 'index';

    public function __construct() {
        $this->controllerPath = __DIR__ . '/../controllers/';
        $this->parseUrl();
    }

    /**
     * Parse URL parameters to extract controller and action
     * Supports both:
     * - ?controller=petugas&action=create&id=1 (new format)
     * - ?action=petugas&id=1 (legacy format - defaults to PetugasController)
     */
    private function parseUrl() {
        // Get controller parameter - default to 'petugas' if not specified
        $rawController = $_GET['controller'] ?? 'petugas';
        
        // Capitalize first letter and append 'Controller'
        // e.g., 'user' becomes 'UserController'
        $this->controller = ucfirst(strtolower($rawController)) . 'Controller';
        
        // Get action parameter - default to 'index'
        $this->action = $_GET['action'] ?? $this->defaultAction;
        
        // Store all other parameters for potential use
        $this->params = $_GET;
    }

    /**
     * Get the full controller class name
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * Get the action method name
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * Get URL parameters
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * Check if controller file exists
     */
    private function controllerExists() {
        $filePath = $this->controllerPath . $this->controller . '.php';
        return file_exists($filePath);
    }

    /**
     * Load and instantiate the controller
     */
    private function loadController() {
        $filePath = $this->controllerPath . $this->controller . '.php';
        
        if (!$this->controllerExists()) {
            return null;
        }
        
        require_once $filePath;
        
        if (!class_exists($this->controller)) {
            return null;
        }
        
        return new $this->controller();
    }

    /**
     * Check if the action method exists in the controller
     */
    private function methodExists($controller) {
        return method_exists($controller, $this->action);
    }

    /**
     * Route the request to the appropriate controller and action
     */
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
        
        // Handle actions that require parameters (e.g., edit, delete)
        if ($this->needsId($action)) {
            $id = $this->params['id'] ?? null;
            if (!$id) {
                // Redirect to default action if ID is missing
                header('Location: index.php?action=petugas');
                exit();
            }
            $controller->$action($id);
        } else {
            $controller->$action();
        }
    }

    /**
     * Check if the action method requires an ID parameter
     */
    private function needsId($action) {
        return in_array($action, ['edit', 'delete', 'show', 'view']);
    }

    /**
     * Handle routing errors
     */
    private function handleError($code, $message) {
        http_response_code($code);
        
        // Log the error (optional)
        error_log("Router Error [$code]: $message");
        
        // For now, redirect to home page with error message
        // In production, you might want to show a proper 404 page
        if ($code === 404) {
            // Redirect to home/dashboard
            header('Location: index.php?action=index');
            exit();
        }
    }

    /**
     * Get current route info for view context
     * Useful for determining active menu items in sidebar
     */
    public static function getCurrentRoute() {
        $controller = $_GET['controller'] ?? 'petugas';
        $action = $_GET['action'] ?? 'index';
        
        return [
            'controller' => strtolower($controller),
            'action' => strtolower($action),
        ];
    }

    /**
     * Check if a given route is active (matches current URL)
     * Supports flexible matching:
     * - isActive('index') - matches action=index
     * - isActive('petugas') - matches action=petugas
     * - isActive('petugas', 'create') - matches controller=petugas&action=create
     * 
     * @param string $action The action to check
     * @param string|null $controller The controller to check (optional)
     * @return bool
     */
    public static function isActive($action, $controller = null) {
        $currentRoute = self::getCurrentRoute();
        $currentAction = $currentRoute['action'];
        $currentController = $currentRoute['controller'];
        
        // If controller is specified, check both controller and action
        if ($controller !== null) {
            return strtolower($controller) === $currentController && 
                   strtolower($action) === $currentAction;
        }
        
        // Otherwise, just check the action (for backward compatibility)
        return strtolower($action) === $currentAction;
    }
}
