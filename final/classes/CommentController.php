<?php 
class CommentController {

    public function __construct(DatabaseTable $commentsTable, DatabaseTable $postsTable) {
        $this->commentsTable = $commentsTable;
        $this->postsTable = $postsTable;
    } 

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = intval($_POST['post_id'] ?? 0);
            $values = [
                'post_id' => $postId,
                'user_id' => $_SESSION['user_id'],
                'content' => $_POST['content']
            ];
            $this->commentsTable->insert($values);
            header('Location: index.php?action=view&id=' . $postId);
            exit();
        }
        header('Location: index.php?action=list');
        exit();
    }
}
?>

