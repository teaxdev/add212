<?php 
class UserController {

    public function __construct(DatabaseTable $usersTable) {
        $this->usersTable = $usersTable;
    } 

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $values = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            $this->usersTable->insert($values);
            header('Location: index.php?action=login');
            exit();
        }
        return [
            'template' => 'auth.html.php',
            'title' => 'Register',
            'variables' => ['isLogin' => false]
        ];
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->usersTable->findOne('email', $_POST['email']);
            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: index.php?action=list');
                exit();
            }
        }
        return [
            'template' => 'auth.html.php',
            'title' => 'Login',
            'variables' => ['isLogin' => true]
        ];
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=list');
        exit();
    }
}
?>

