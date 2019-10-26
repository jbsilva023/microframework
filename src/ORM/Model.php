<?php


namespace JbSilva\ORM;

use JbSilva\ORM\Drivers\Mysql;
use JbSilva\ORM\QueryBuilder\Insert;
use JbSilva\ORM\QueryBuilder\Select;
use JbSilva\ORM\QueryBuilder\Delete;
use JbSilva\ORM\Drivers\DriverInterface;

abstract class Model
{
    protected $data;
    protected $driver;

    public function __construct()
    {
        $this->setDriver(new Mysql());
    }

    public function setAll(array $data)
    {
        $this->data = $data;
    }

    public function getAll()
    {
        return $this->data;
    }

    public function getTable() : string
    {
        if (empty($this->table)) {
            $table = explode('\\', get_class($this));
            return strtolower(array_pop($table));
        }

        return $this->table;
    }

    public function setDriver(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function save()
    {
        return $this->driver
            ->setQueryBuilder(new Insert($this->getTable(), $this))
            ->exec();

        return $this->find($this->driver->lastInsertedId());
    }

    public function all(array $conditions = [])
    {
        $collection = [];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions))
            ->exec()
            ->all();

        foreach ($data as $given) {
            $className = get_class($this);
            $class = new $className;
            $class->setAll($given);
            $collection[] = $class;
        }

        return $collection;
    }

    public function find($id)
    {
        $conditions[] = ['id', $id];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions))
            ->exec()
            ->first();

        $this->setAll($data);

        return $this;
    }

    public function delete()
    {
        $conditions[] = ['id', $this->id];

        return $this->driver
            ->setQueryBuilder(new Delete($this->getTable(), $conditions))
            ->exec();
    }

    public function __get($name)
    {
        $method = $this->methodName('get', $name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $method = $this->methodName('set', $name, $value);

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }

        $this->data[$name] = $value;
    }

    private function methodName($prefix, $name)
    {
        return $prefix . str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
    }
}
