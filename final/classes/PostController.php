<?php 
class PostController {

    public function __construct(DatabaseTable $postsTable, DatabaseTable $usersTable, DatabaseTable $commentsTable) {
        $this->postsTable = $postsTable;
        $this->usersTable = $usersTable;
        $this->commentsTable = $commentsTable;
    } 

    public function list() { 
        $posts = $this->postsTable->findAll('created_at DESC'); 
        return [
            'template' => 'posts.html.php', 
            'title' => 'Blog Posts', 
            'variables' => ['posts' => $posts]
        ]; 
    } 

    public function view() {
        $post = $this->postsTable->findOne('id', intval($_GET['id'] ?? 0));
        if (!$post) {
            return [
                'template' => 'error.html.php',
                'title' => 'Post Not Found',
                'variables' => []
            ];
        }
        $author = $this->usersTable->findOne('id', $post['user_id']);
        $comments = $this->commentsTable->find('post_id', $post['id']);
        $commentAuthors = [];
        foreach ($comments as $comment) {
            $commentAuthors[$comment['id']] = $this->usersTable->findOne('id', $comment['user_id']);
        }
        return [
            'template' => 'post.html.php',
            'title' => $post['title'],
            'variables' => [
                'post' => $post,
                'author' => $author,
                'comments' => $comments,
                'commentAuthors' => $commentAuthors
            ]
        ];
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $values = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_SESSION['user_id'],
                'category' => $_POST['category'] ?? ''
            ];
            $this->postsTable->insert($values);
            header('Location: index.php?action=list');
            exit();
        }
        return [
            'template' => 'form_post.html.php',
            'title' => 'Create Post',
            'variables' => []
        ];
    }

    public function update() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        $post = $this->postsTable->findOne('id', intval($_GET['id'] ?? $_POST['id'] ?? 0));
        if (!$post) {
            return [
                'template' => 'error.html.php',
                'title' => 'Post Not Found',
                'variables' => []
            ];
        }
        if ($post['user_id'] != $_SESSION['user_id']) {
            header('Location: index.php?action=list');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id'] ?? 0);
            $values = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'category' => $_POST['category'] ?? ''
            ];
            $this->postsTable->update($values, $id);
            header('Location: index.php?action=view&id=' . $id);
            exit();
        }
        return [
            'template' => 'form_post.html.php',
            'title' => 'Edit Post',
            'variables' => ['post' => $post]
        ];
    }

    public function delete() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $post = $this->postsTable->findOne('id', $id);
            if ($post && $post['user_id'] == $_SESSION['user_id']) {
                $this->postsTable->delete('id', $id);
            }
        }
        header('Location: index.php?action=list');
        exit();
    }
}
?>

