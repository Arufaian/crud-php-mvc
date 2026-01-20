<?php

require_once __DIR__ . '/controllers/UserController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new UserController();

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'users':
        $controller->users();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        } else {
            header('Location: index.php?action=users');
            exit();
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: index.php?action=users');
            exit();
        }
        break;
    default:
        $controller->index();
        break;
}