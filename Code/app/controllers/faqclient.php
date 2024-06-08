<?php

Class FaqClient extends Controller 
{
    function index()
    {
        unset($_SESSION['error_message']);
        $data['page_title'] = "FAQ";

        // Récupérer les questions et réponses depuis la base de données
        $query = "SELECT * FROM faq1";
        $data['faqs'] = $this->DB->read($query);

        $this->view("faqclient", $data);
    }
}
