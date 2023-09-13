<?php

$person = new PersonController($getdb);
$response = $person->read($user_id);
http_response_code(200);
echo json_encode($response);
