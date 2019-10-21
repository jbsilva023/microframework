<?php


namespace JbSilva\ORM;

use JbSilva\ORM\Drivers\DriverStrategy;

class Model
{
    protected $driver;

    public function setDriver(DriverStrategy $driver)
    {
        $this->driver = $driver;
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
}
