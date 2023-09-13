<?php

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$sanitizedName = Validator::sanitize($name);
$checkedString = Validator::string($sanitizedName);

if (!Validator::empty($checkedString)) {
    abort("Name is Required", 401);
} else {
    $person = new PersonController($getdb);
    $rows = $person->create($name);

    http_response_code(200);
    echo json_encode($rows);
}
