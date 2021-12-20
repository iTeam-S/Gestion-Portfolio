<?php
session_start();
header('Content-Type: application/json');
echo json_encode(array('id' => $_SESSION['id']), JSON_FORCE_OBJECT);
