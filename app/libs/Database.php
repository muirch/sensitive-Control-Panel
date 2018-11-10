<?php

namespace app\libs;

use PDO;

/**
 * Database class
 */
class Database
{
    protected $db;

    public function __construct()
    {
        $config = require 'app/configs/global.php';
        $this->db = new PDO('mysql:host=' . $config['db']['host'] .
            ';dbname=' . $config['db']['name'],
            $config['db']['user'],
            $config['db']['pass']);
        $this->db->exec("set names utf8");
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':' . $key, $val, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}