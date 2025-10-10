<?php 
class JokeController {

    public function __construct(DatabaseTable $jokesTable, DatabaseTable $authorsTable) {
        $this->jokesTable = $jokesTable;
        $this->authorsTable = $authorsTable;
    } 

    public function list() { 
        $jokes = $this->jokesTable->findAll(); 
        return [ 'template' => 'jokes.html.php', 'title' => 'Joke List', 'variables' => ['jokes' => $jokes] ]; 
    } 

    public function home() { 
        return [ 'template' => 'home.html.php', 'title' => 'Welcome to the Joke Site', 'variables' => [] ]; 
    } 

    public function delete() { if (isset($_POST['id'])) { $this->jokesTable->delete('id', $_POST['id']); } 
        header('Location: index.php?action=list'); exit(); 
    } 
} 

?>