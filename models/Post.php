<?php
require_once 'Model.php';
class Post extends Model{
    protected $required = array(
        'title',
        'post_date',
        'content'
    );

    protected $table = 'post';

    public function get_list($params){
        $sql = "SELECT `post`.*,CONCAT(`user`.first_name,' ',`user`.last_name) as author FROM `".$this->table."` INNER JOIN `user` ON `user`.id=`post`.user_id";
        if (isset($params['where'])){
            $sql .= " ".$params['where'];
        }

        if (isset($params['orderby'])){
            $sql .= " ".$params['orderby'];
        }

        if (isset($params['limit'])){
            $sql .= " ".$params['limit'];
        }
        
        $res = $this->db->query($sql);
        if ($res)
            return $res->fetch_all(MYSQLI_ASSOC);
        else
            return false;
    }
}