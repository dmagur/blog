<?php
require_once 'Model.php';
class Comment extends Model{
    protected $required = array(
        'name',
        'comment'
    );

    protected $table = 'comment';
}