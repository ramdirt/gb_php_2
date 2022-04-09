<?php
// 2* Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочеки:
// echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->getAll();
// что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5


class Db
{
    protected $tableName;
    protected $wheres = [];
    protected $andWheres = [];

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getOne($id)
    {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id} <br>";
    }

    public function where($field, $value)
    {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andWhere($field, $value)
    {
        $this->andWheres[] = [
            'field' => $field,
            'value' => $value
        ];

        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";

        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
        }
        if (!empty($this->andWheres)) {
            $sql .= " AND ";
            foreach ($this->andWheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->andWheres)) $sql .= " AND ";
            }
        }

        $this->wheres = array();
        $this->andWheres = array();

        return $sql . "<br>";
    }
}

$db = new Db();


echo $db->table('goods')->getAll();
echo $db->table('users')->getAll();
echo $db->table('goods')->getOne(1);
echo $db->table('user')->getOne(2);
echo $db->table('user')->where('name', 'admin')->where('session', 123)->getAll();
echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->getAll();