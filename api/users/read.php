<?php
include "../../db.php";
session_start();
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

     $stmt = $conn->query("SELECT * FROM users ");
     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

     echo json_encode(['status' => 'success', 'data' => $users]);
} else {
     echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}