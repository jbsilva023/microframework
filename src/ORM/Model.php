<?php


namespace JbSilva\ORM;

use JbSilva\ORM\Drivers\DriverStrategy;

abstract class Model
{
    protected $driver;

    public function setDriver(DriverStrategy $driver)
    {
        $this->driver = $driver;
        $this->driver->setTable($this->table);
        return $this;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function save()
    {
        $this->getDriver()
            ->save($this)
            ->exec();
    }

    public function findAll(array $conditions = [])
    {
        $this->getDriver()
            ->select($conditions)
            ->exec()
            ->all();
    }

    public function find($id)
    {
        $this->getDriver()
            ->select(['id' => $id])
            ->exec()
            ->first();
    }

    public function delete()
    {
        $this->getDriver()
            ->delete(['id' => $this->id])
            ->exec();
    }

    public function __get($variable)
    {
        if ($variable === 'table') {
            $table = explode('\\', get_class($this));
            return strtolower(array_pop($table));
        }

        return null;
    }
}
