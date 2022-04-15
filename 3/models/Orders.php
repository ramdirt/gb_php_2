<?php

namespace app\models;


class User extends Model
{

    public $id;
    public $user_id;
    public $status_id;

    public function __construct($user_id = null, $status_id = null)
    {
        $this->user_id = $user_id;
        $this->status_id = $status_id;
    }

    protected function getTableName()
    {
        return 'orders';
    }
}