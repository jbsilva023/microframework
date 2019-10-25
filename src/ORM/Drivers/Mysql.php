<?php


namespace JbSilva\ORM\Drivers;

use JbSilva\ORM\Model;
use JbSilva\ORM\Connection;
use JbSilva\ORM\QueryBuilder\QueryBuilderInterface;
use JbSilva\ORM\QueryBuilder\Select;

class Mysql implements DriverInterface
{
    protected $pdo;
    protected $query;
    protected $stmt;
    //protected $table;

    public function __construct()
    {
        $this->pdo = Connection::init();
    }
    public function connect()
    {
        $this->pod = Connection::init();
    }

    public function close()
    {
        $this->pdo = null;
    }

    public function setQueryBuilder(QueryBuilderInterface $query)
    {
        $this->query =  $query;
        return $this;
    }

    public function exec(string $query = null)
    {
        $this->stmt = $this->pdo->prepare((string)$this->query);
        $this->stmt->execute();
        return $this;
    }

    public function lastInsertedId()
    {
        // TODO: Implement lastInsertedId() method.
    }

    public function first()
    {
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all()
    {
        return $this->stmt->fetchall(\PDO::FETCH_ASSOC);
    }


    /*public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function save(Model $data)
    {
        if (!empty($data->id)) {
            $this->update($data);
            return $this;
        }

        $this->insert($data);
        return $this;
    }

    public function insert(Model $data)
    {
        $query = 'INSERT INTO %s (%s) VALUES (%s)';
        $fields = [];
        $fields_to_bind = [];

        foreach ($data as $field => $value) {
            $fields[] = $field;
            $fields_to_bind[] = ':' . $field;
        }

        $fields = implode(', ', $fields);
        $fields_to_bind = implode(', ', $fields_to_bind);

        $query = sprintf($query, $this->table, $fields, $fields_to_bind);

        $this->query = $this->pdo->prepare($query);
        $this->bind($data);

        return $this;
    }

    public function update(Model $data)
    {
        $query = 'UPDATE %s SET %s';

        $data_to_update = $this->params($data);

        $query = sprintf($query, $this->table, $data_to_update);
        $query .= ' WHERE id=:id';

        $this->query = $this->pdo->prepare($query);
        $this->bind($data);

        return $this;
    }

    public function select(array $conditions = [])
    {
        $query = 'SELECT * FROM ' . $this->table;

        $data = $this->params($conditions);

        if ($conditions) {
            $query .= ' WHERE ' . $data;
        }

        $this->query = $this->pdo->prepare($query);
        $this->bind($conditions);

        return $this;
    }

    public function delete($conditions)
    {
        $query = 'DELETE FROM ' . $this->table;

        $data = $this->params($conditions);

        if ($conditions) {
            $query .= ' WHERE ' . $data;
        }

        $this->query = $this->pdo->prepare($query);
        $this->bind($conditions);

        return $this;
    }

    public function exec(string $query = null)
    {
        if ($query) {
            $this->query = $this->pdo->prepare($query);
        }

        $this->query->execute();
        return $this;
    }

    public function first()
    {
        return $this->query->fetch(\PDO::FETCH_ASSOC);
    }

    public function all()
    {
        return $this->query->fetchall(\PDO::FETCH_ASSOC);
    }

    protected function params($conditions)
    {
        $fields = [];

        foreach ($conditions as $field => $value) {
            $fields[] = $field . '=:' . $field;
        }

        return implode(', ', $fields);
    }

    protected function bind($data)
    {
        foreach ($data as $field => $value) {
            $this->query->bindValue($field, $value);
        }
    }

    public function join(Model $data, $table_name_relationship, $relationship_id, $other_relationship_id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' INNER JOIN ' . $table_name_relationship .
            ' ON ' . $this->table . '.id=' . $table_name_relationship . '.' . $relationship_id
        . ' WHERE ' . $this->table . '.id=' . $this->id;

        $this->query = $this->pdo->prepare($query);
        return $this;
    }*/
}
