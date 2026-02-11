<?php
require_once __DIR__ . '/../models/Visite.php';

class ApiVisiteController {

    public function getAll() {
        $visiteModel = new Visite();
        $visites = $visiteModel->getAll();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($visites, JSON_UNESCAPED_UNICODE);
    }

    public function getById($id) {
        $visiteModel = new Visite();
        $visite = $visiteModel->getById($id);
        header('Content-Type: application/json; charset=utf-8');
        if ($visite) {
            echo json_encode($visite, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['error' => 'Visite non trouvée'], JSON_UNESCAPED_UNICODE);
        }
    }

    public function search($query) {
        $visiteModel = new Visite();
        $result = $visiteModel->searchByName($query);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
