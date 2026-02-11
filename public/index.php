<?php
require_once __DIR__ . '/../app/controllers/ApiVisiteController.php';

$controller = new ApiVisiteController();
$action = $_GET['action'] ?? 'visites';

switch($action) {
    case 'visites':
        $controller->getAll();
        break;

    case 'visite':
        if (!isset($_GET['id'])) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['error' => 'ID manquant']);
            exit;
        }
        $controller->getById($_GET['id']);
        break;

    case 'search':
        if (!isset($_GET['query'])) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([]);
            exit;
        }
        $controller->search($_GET['query']);
        break;

    default:
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'Action non reconnue']);
        break;
}
