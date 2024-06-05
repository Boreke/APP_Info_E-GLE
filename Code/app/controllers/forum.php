<?php

Class Forum extends Controller
{

	function index()
	{
		unset($_SESSION['error_message']);
        
		$data['page_title'] = "Forum";

        

        $post_model=$this->loadModel("post");
        $data['commentaires']= $post_model->getCommentaireById(1);

		$this->view("forum",$data);
	}

    function displayPost(){
        $post_model=new Post();
        $posts = $post_model->getPosts();
        if (isset($posts) && count($posts) > 0){
            foreach ($posts as $post){
                $formatted_date = date('d-m-Y', strtotime($post->date));
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
                        </div>
                        <button class="editPostBtn" " data-titre="' . $post->titre . '" data-contenu="'. $post->contenu . '">Edit</button>
                      </div>';
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
                                        <h4>' . $comm->date . '</h4>
                                    </div>
                                    <p>' . $comm->contenu . '</p> 
                                 </div>';
                
            }
        }

        return $commentHtml;
    }

}