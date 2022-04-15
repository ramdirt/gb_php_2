<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function insert()
    {

        $params = array();

        foreach ($this as $key => $value) {

            //TODO собрать INSERT  пропустить id
            if ($key != 'id') {
                $params[$key] = $value;
            }
        }


        $insert = Db::getInstance()->insertSQL($params);
        $tableName = $this->getTableName();

        $sql = "INSERT INTO `{$tableName}`" . $insert;

        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    // не стал доделывать update потому
    //что совниваюсь в том как его делать

    // public function update()
    // {
    //     if (!empty($this->id)) {

    //         $params = array();

    //         foreach ($this as $key => $value) {

    //             if ($key != 'id') {
    //                 $params[$key] = $value;
    //             }
    //         }

    //         $update = Db::getInstance()->updateSQL($params);
    //         $tableName = $this->getTableName();

    //         $sql = "UPDATE `{$tableName}` SET " . $update . ' WHERE id = :id';
    //         echo $sql;
    //     } else {

    //         echo 'объекта нет в базе данных, сделайте insert';
    //     }
    // }

    public function delete()
    {
        $id = $this->id;
        $sql = "DELETE FROM {$this->getTableName()} WHERE `id` = :id";
        return Db::getInstance()->execute($sql, ['id' => $id]);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
        // return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    protected abstract function getTableName();
}