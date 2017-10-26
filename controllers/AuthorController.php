<?php
namespace Check24Blog\Controllers;

use Check24Blog\Core\Controller;

class AuthorController extends Controller{
    function posts(){
        if (!isset($_REQUEST['id'])) $this->redirect("/");
        require_once 'Post.php';
        $post = new Post($this->db);
        $id = $_REQUEST['id'];
        $this->db->real_escape_string($id);

        $params = ['where' => "WHERE user_id='$id'",'orderby' => 'order by post_date desc'];
        $posts = $post->get_list($params);

        $this->out('author_posts','default',['posts' => $posts]);
    }
}