<?php

Class Forum extends Controller
{

	function index()
	{
		unset($_SESSION['error_message']);
        $post_model=$this->loadModel("post");
        $data['commentaires']= $post_model->getCommentaireById(1);
		$data['page_title'] = "Forum";
        
        $db = new Database();

        $posts= $post_model->getPosts();
        $data['posts']=$posts;
		$this->view("forum",$data);
	}

    function displayPost(){
        if (is_array($data['posts']) && count($data['posts']) > 0){
            foreach ($data['posts'] as $post){
                echo '<div class="PostItem">
                        <div class="post">
                            <h2>' . $post->titre . '</h2>
                        </div>
                        <div class="commentaire"> 
                             <h2>' . $post->contenu . '</h3> 
                        </div>
                        <button class="editPostBtn" data-id="<?= $post->id ?>" data-question="<?= $faq->question ?>" data-answer="<?= $faq->answer ?>">Edit</button>
                      </div>';
            }

        }else{
            echo '<h1>No Posts found.</h1>';
        }
            
        
    }
    function displayCommentaire($id){
        $post_model=new Post();
        $comms=$post_model->getCommentaireById($id);

        if($comms){
            foreach ($comms as $comm) {
                echo '<div class="commentaire"> 
                        <div class="comm-head">
                        <h3>' . $comm->username . '</h3>
                        <h4>'. $comm->date.'</h4>
                        </div>
                        <p>' . $comm->contenu . '</p> 
                    </div>';
            }
        }
    }

}