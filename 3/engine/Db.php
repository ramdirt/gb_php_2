<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop_db_2',
        'charset' => 'utf8',
    ];

    private $connection = null; //PDO

    use TSingletone;

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            // $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->connection;
    }

    public function lastInsertId()
    {
        //TODO вернуть id
        return (int) $this->getConnection()->lastInsertId();
    }

    private function prepareDsnString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    //sql = "SELECT * FROM `products` WHERE id = :id" $params = ['id'=>1]
    private function query($sql, $params)
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->execute($params);
        // $STH->debugDumpParams();
        return $STH;
    }

    public function queryOneObject($sql, $params, $class)
    {
        $STH = $this->query($sql, $params);
        //TODO сделать чтобы конструктор вызывался до извлечения из БД
        $STH->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $STH->fetch();
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function insertSQL($params)
    {
        $set = '';
        $values = '';

        $count = count($params) - 1;

        foreach ($params as $key => $value) {
            $set .= "`" . str_replace("`", "``", $key) . "`";
            $values .= ":{$key}";
            if (array_search($key, array_keys($params)) != $count) {
                $set .= ' , ';
                $values .= ' , ';
            }
        }

        return "({$set}) VALUES ({$values});";
    }
    public function updateSQL($params)
    {

        return "";
    }
}
