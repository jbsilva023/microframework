<?php


namespace JbSilva\ORM;

use JbSilva\ORM\QueryBuilder\Select;
use JbSilva\ORM\Drivers\DriverInterface;

abstract class Model
{
    protected $data;
    protected $driver;

    public function setAll(array $data)
    {
        $this->data = $data;
    }

    public function getAll()
    {
        return $this->data;
    }

    /*public function getTable() : string
    {
        return 'users';
    }

    public function setDriver(DriverInterface $driver)
    {
        $this->driver = $driver;
        //$this->driver->setTable($this->table);
        return $this;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function save()
    {
        return $this->getDriver()
            ->save($this)
            ->exec();
    }

    public function all(array $conditions = [])
    {
        $data = $this->getDriver()
            ->setQueryBuilder(new Select($this->getTable()))
            ->exec()
            ->first();

        $this->setAll($data);

        return $this;
    }

    public function find($id)
    {
        $data = $this->getDriver()
            ->select(['id' => $id])
            ->exec()
            ->first();

        return $data;
    }

    public function delete()
    {
        return $this->getDriver()
            ->delete(['id' => $this->id])
            ->exec();
    }

    public function __get($variable)
    {
        if ($variable === 'table') {
            $table = explode('\\', get_class($this));
            return strtolower(array_pop($table));
        }

        return $this->data[$name] ?? null;
    }*/
}
