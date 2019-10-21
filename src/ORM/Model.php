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
        return $this->getDriver()
            ->save($this)
            ->exec();
    }

    public function findAll(array $conditions = [])
    {
        $data = $this->getDriver()
            ->select($conditions)
            ->exec()
            ->all();

        return $this->collection_objects($data);
    }

    public function find($id)
    {
        $data = $this->getDriver()
            ->select(['id' => $id])
            ->exec()
            ->first();

        return $this->collection_objects($data);
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

        return null;
    }

    protected function collection_objects(array $collection)
    {
        $objects_collection = [];

        foreach ($collection as $item) {
            $objects_collection[] = (object) $item;
        }

        return $objects_collection;
    }
}
