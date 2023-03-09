
<?php
require_once '../app/controllers/UserController.php';

session_start();
if(!isset($_SESSION['user'])){
    $param = 'register';
    $query = http_build_query(array('action' => $param));
    header('Location: http://localhost/p/fornow/public/index.php?' . $query);
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = new UserController();
switch ($action) {
    case 'login':
        $controller->login();
        break;
    case 'register':
        $controller->register();
        break;
    case 'profile':
        $controller->profile();
        break;
    case 'home':
        $controller->home();
        break;
    default:
        $controller->index();
}
?>
