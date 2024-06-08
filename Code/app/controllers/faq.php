<?php

Class Faq extends Controller 
{
    function index()
    {
        unset($_SESSION['error_message']);
        $data['page_title'] = "FAQ";

        // Récupérer les questions et réponses depuis la base de données

        $query = "SELECT * FROM faq1";
        $data['faqs'] = $this->DB->read($query);

        $this->view("faq", $data);
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = $_POST['question'];
            $answer = $_POST['answer'];

    
            $query = "INSERT INTO faq1 (question, answer) VALUES (:question, :answer)";
            $this->DB->write($query, ['question' => $question, 'answer' => $answer]);
            
            header("Location: " . ROOT . "faq");
            die;
        }
    }

    function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $question = $_POST['question'];
            $answer = $_POST['answer'];

    
            $query = "UPDATE faq1 SET question = :question, answer = :answer WHERE id = :id";
            $this->DB->write($query, ['id' => $id, 'question' => $question, 'answer' => $answer]);
            
            header("Location: " . ROOT . "faq");
            die;
        }
    }
}
