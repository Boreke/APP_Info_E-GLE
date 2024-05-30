<?php

Class Faq extends Controller 
{
    function index()
    {
        unset($_SESSION['error_message']);
        $data['page_title'] = "FAQ";

        // Récupérer les questions et réponses depuis la base de données
        $db = new Database();
        $query = "SELECT * FROM faq1";
        $data['faqs'] = $db->read($query);

        $this->view("faq", $data);
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = $_POST['question'];
            $answer = $_POST['answer'];

            $db = new Database();
            $query = "INSERT INTO faq1 (question, answer) VALUES (:question, :answer)";
            $db->write($query, ['question' => $question, 'answer' => $answer]);
            
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

            $db = new Database();
            $query = "UPDATE faq1 SET question = :question, answer = :answer WHERE id = :id";
            $db->write($query, ['id' => $id, 'question' => $question, 'answer' => $answer]);
            
            header("Location: " . ROOT . "faq");
            die;
        }
    }
}
