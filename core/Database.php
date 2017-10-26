<?php
    class Database{
        private $config;
        public $connection;
        function __construct($config)
        {
            $this->config = $config;
            $this->connect();
        }

        private function connect(){
            $this->connection = new mysqli($this->config->get('dbhost'),$this->config->get('dbuser'),$this->config->get('dbpass'),$this->config->get('dbname'));
            if ($this->connection->connect_error){
                throw new Exception(mysqli_connect_error(),mysqli_connect_errno());
            }
        }
    }