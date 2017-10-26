<?php
foreach ($data['posts'] as $p){
    $data['post'] = $p;
    $type = 'short';
    include 'views/includes/post.php';
}
?>