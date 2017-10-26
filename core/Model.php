<?php
class Model{
    protected $db;
    protected $required;

    function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function validate($data){
        $errors = array();
        foreach ($this->required as $r)
            if (!isset($data[$r]) or empty($data[$r])) $errors[$r] = 1;

        return $errors;
    }

    public function insert($data){
        foreach ($data as $key => $value){
            $this->db->real_escape_string($data[$key]);
        }
        if ($this->db->query("INSERT INTO `".$this->table."`(".implode(",",array_keys($data) ).") VALUES('".implode("','",array_values($data))."')"))
            return $this->db->insert_id;
        else
            throw new Exception($this->db->error);
    }

    public function update($data){
        $id = $data['id'];
        $this->db->real_escape_string($id);
        unset($data['id']);
        $values = [];
        foreach ($data as $key => $value){
            $this->db->real_escape_string($data[$key]);

            $values[] = $key."='".$value."'";
        }
        $values = implode(",",$values );

        if ($this->db->query("UPDATE `".$this->table."` set ".$values." where id='$id'"))
            return true;
        else
            throw new Exception($this->db->error);
    }

    public function get($id){
        $this->db->real_escape_string($id);
        $res = $this->db->query("SELECT * FROM `".$this->table."` WHERE id='$id'");
        if ($res)
            return $res->fetch_assoc();
        else
            return false;
    }

    public function get_by_key($key,$value){
        $this->db->real_escape_string($value);
        $res = $this->db->query("SELECT * FROM `".$this->table."` WHERE $key='$value'");
        if ($res)
            return $res->fetch_all(MYSQLI_ASSOC);
        else
            return false;
    }

    public function get_list($params){
        $sql = "SELECT * FROM `".$this->table."`";
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