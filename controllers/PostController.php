<?php
require_once 'Post.php';
class PostController extends Controller{
    function add(){
        $errors = array();
        if (isset($_REQUEST['submit']) and $_REQUEST['submit']){
            $post = new Post($this->db);
            $_REQUEST['data']['user_id'] = $_SESSION['uid'];
            $_REQUEST['data']['post_date'] = date("Y-m-d",strtotime($_REQUEST['data']['post_date']));
            $errors = $post->validate($_REQUEST['data']);
            if (empty($errors)) {
                $id = $post->insert($_REQUEST['data']);
                $this->redirect('/?action=post-details&id='.$id);
            }
        }

        $this->out('add_post','default',['errors' => $errors]);
    }

    function details(){
        if (!isset($_REQUEST['id'])) $this->redirect("/");

        $errors = array();
        require_once 'Comment.php';
        $comment = new Comment($this->db);

        $post = new Post($this->db);
        $data = $post->get($_REQUEST['id']);

        if (isset($_REQUEST['submit']) and $_REQUEST['submit']){
            $_REQUEST['comment']['user_id'] = $_SESSION['uid'];
            $_REQUEST['comment']['post_id'] = $_REQUEST['id'];
            $_REQUEST['comment']['post_date'] = date("Y-m-d");
            $_REQUEST['comment']['ip'] = $_SERVER['REMOTE_ADDR'];
            $errors = $comment->validate($_REQUEST['comment']);
            if (empty($errors)) {
                $comment->insert($_REQUEST['comment']);
                $data['comments_num']++;
                $post->update($data);
            }
        }

        if (!$data) $this->redirect("/");

        require_once 'User.php';
        $author = new User($this->db);
        $author_data = $author->get($data['user_id']);

        $data['author'] = $author_data['first_name']." ".$author_data['last_name'];

        $comments = $comment->get_by_key('post_id', $_REQUEST['id']);

        $this->out('post_details','default',['post' => $data,'errors' => $errors,'comments' => $comments]);
    }
}