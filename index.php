<?php

include_once 'controllers/UserController.php';
include_once 'controllers/CourseController.php';
include_once 'controllers/RegistrationController.php';
include_once 'controllers/Controller.php';

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Checking for resources and image files to route it differently
if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // Serve the requested resource as-is.
}

// Instance of the controllers
$UserController = new \controllers\UserController();
$controller = new \controllers\Controller();


// Routing it up!
switch ($request_uri[0]) {
    case '/register':
        return $UserController->index();
        break;

    default:
        echo "404 not found";
        break;
}
