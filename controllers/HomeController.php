<?php
require_once 'Controller.php';
class HomeController extends Controller{
    function index(){
        require_once 'Post.php';
        $post = new Post($this->db);
        
        $posts = $post->get_list([/*'limit' => 'LIMIT 3',*/'orderby' => 'order by post_date desc']);
        #var_dump($posts);

        $this->out('home','default',['posts' => $posts]);
    }

    function surface(){
        $this->out('surface');
    }
}