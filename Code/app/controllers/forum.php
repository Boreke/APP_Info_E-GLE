<?php

Class Forum extends Controller
{

	function index()
	{
		unset($_SESSION['error_message']);
        
		$data['page_title'] = "Forum";

        $post_model=$this->loadModel("post");
        $data['commentaires']= $post_model->getCommentaireById(1);
        $data['posts']= $post_model->getPosts();
		$this->view("forum",$data);
	}

    function add()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $post_type = $_POST['post_type'];
            $date= new DateTime();
            $formatted_date = $date->format('Y-m-d H:i:s');

            
            $query = "INSERT INTO post (titre, date, contenu, post_type, user_id_user) VALUES (:titre, :date, :contenu, :post_type, :user_id)";
            $this->DB->write($query, ['titre' => $titre, 'date' => $formatted_date,'contenu' => $contenu, 'post_type' => $post_type, 'user_id' => $this->user->getUserId()]);
            
            header("Location: " . ROOT . "forum");
            die;
        }
    }

    function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];

            
            $query = "UPDATE post SET titre = :titre, contenu = :contenu WHERE idpost = :id";
            $this->DB->write($query, ['titre' => $titre, 'contenu' => $contenu, 'id' => $id], false);
            
            header("Location: " . ROOT . "forum");
            die;
        }
    }

    function displayPost(){
        $post_model=new Post();
        $posts = $post_model->getPosts();
        if (isset($posts) && count($posts) > 0){
            foreach ($posts as $post){
                $formatted_date = date('H:i d-m-Y', strtotime($post->date));
                $commentaires = $this->displayCommentaire($post->idpost);
                echo '<div class="PostItem">
                        
                        <div class="post">
                            <div class="post-head">
                                <div class="title-username">
                                    <h2>' . $post->titre . '</h2>
                                    <p>' . $post->username . '</p>
                                </div>
                                <div call="date-type">
                                    <h3>' . $formatted_date . '</h3>
                                    <p>' . $post->post_type . '</p>
                                    <p>' . $post->type . '</p>
                                </div>
                            </div>
                            <div class="contenu"> 
                                <p>' . $post->contenu . '</p> 
                            </div>
                            
                        </div>
                        <div class = "commentaireList">'.$commentaires.'
                        </div>';
                        if (isset($_SESSION['user_id'])) {
                            if($_SESSION['user_id']==$post->id_user||$_SESSION['type']=='admin'){
                                echo '<button class="editPostBtn" " data-titre="' . $post->titre . '" data-contenu="'. $post->contenu . '">Edit</button>';
                            }
                        }
                        
            
                        
                      echo'</div>';
            } 
        }else{
            echo '<h1>No Posts found.</h1>';
        }
            
        
    }
    function displayCommentaire($id){
        $post_model = new Post();
        $comms = $post_model->getCommentaireById($id);

        $commentHtml = '';
        
        if ($comms) {
            foreach ($comms as $comm) {
                $commentHtml .= '<div class="commentaire"> 
                                    <div class="comm-head">
                                        <h3>' . $comm->username . '</h3>
                                        <h4>' . date('H:i d-m-Y', strtotime($comm->date)) . '</h4>
                                    </div>
                                    <p>' . $comm->contenu . '</p> 
                                 </div>';
                
            }
        }

        return $commentHtml;
    }

}