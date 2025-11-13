<?php 
// starts a session that saves user cookies
session_start();

require_once 'db/db_connection.php';
require_once 'classes/DatabaseTable.php';
require_once 'classes/PostController.php';
require_once 'classes/UserController.php';
require_once 'classes/CommentController.php';

// Initialize database tables
$usersTable = new DatabaseTable($pdo, 'users', 'id');
$postsTable = new DatabaseTable($pdo, 'posts', 'id');
$commentsTable = new DatabaseTable($pdo, 'comments', 'id');

// Initialize controllers
$postController = new PostController($postsTable, $usersTable, $commentsTable);
$userController = new UserController($usersTable);
$commentController = new CommentController($commentsTable, $postsTable);

$action = $_GET['action'] ?? 'list';

$routes = [
    'list' => fn() => $postController->list(),
    'view' => fn() => $postController->view(),
    'create' => fn() => $postController->create(),
    'update' => fn() => $postController->update(),
    'delete' => fn() => $postController->delete(),
    'register' => fn() => $userController->register(),
    'login' => fn() => $userController->login(),
    'logout' => fn() => $userController->logout(),
    'comment' => fn() => $commentController->create(),
];

$page = isset($routes[$action]) ? $routes[$action]() : ['template' => 'error.html.php', 'title' => 'Page Not Found', 'variables' => []];

// Extract variables
$title = $page['title'];
$variables = $page['variables'] ?? [];
extract($variables);

// Include header
include 'include/header.html.php';

// Include template
include 'templates/' . $page['template'];

// Include footer
include 'include/footer.html.php';
?>