<?php


namespace JbSilva\ORM;

use JbSilva\ORM\Drivers\Mysql;
use JbSilva\ORM\QueryBuilder\Insert;
use JbSilva\ORM\QueryBuilder\Update;
use JbSilva\ORM\QueryBuilder\Select;
use JbSilva\ORM\QueryBuilder\Delete;
use JbSilva\ORM\Drivers\DriverInterface;

abstract class Model
{
    /**
     * @var $data
     * @param array
     */
    protected $data;
    /**
     * @var $driver
     * @param DriverInterface
     */
    protected $driver;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->setDriver(new Mysql());
    }

    /**
     * @param array $data
     */
    public function setAll(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        if (empty($this->table)) {
            $table = explode('\\', get_class($this));
            return strtolower(array_pop($table));
        }

        return $this->table;
    }

    /**
     * @param DriverInterface $driver
     */
    public function setDriver(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return Model
     */
    public function save()
    {
        if (!is_null($this->id)) {
            return $this->update();
        }

        return $this->insert();
    }

    /**
     * @param array $conditions
     * @return array
     */
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

    /**
     * @param $id
     * @return $this
     */
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

    /**
     * @return mixed
     */
    public function delete()
    {
        $conditions[] = ['id', $this->id];

        return $this->driver
            ->setQueryBuilder(new Delete($this->getTable(), $conditions))
            ->exec();
    }

    /**
     * @return Model
     */
    public function insert()
    {
        $this->driver
            ->setQueryBuilder(new Insert($this->getTable(), $this))
            ->exec();

        return $this->find($this->driver->lastInsertedId());
    }

    /**
     * @return Model
     */
    public function update()
    {
        $conditions[] = ['id', $this->id];

        $this->driver
            ->setQueryBuilder(new Update($this->getTable(), $this, $conditions))
            ->exec();

        return $this->find($this->id);
    }

    /**
     * @param $table
     * @param null $foreingKey
     * @param null $otherkey
     * @return mixed
     */
    public function hasMany($className, $foreingKey = null, $otherkey = null)
    {
        $collection = [];

        $model = new $className;
        $foreingKey = $foreingKey ?? substr($this->getTable(), 0, strlen($this->getTable()) -1)  . '_id';

        $conditions[] = ["{$this->getTable()}.id", $this->id];
        $junctions[] = [$model->getTable(), $foreingKey, $otherkey];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions, $junctions, $model))
            ->exec()
            ->all();

        foreach ($data as $given) {
            $class = new $className;
            $class->setAll($given);
            $collection[] = $class;
        }

        return $collection;
    }

    /**
     * @param $name
     * @return |null
     */
    public function __get($name)
    {
        $method = $this->methodName('get', $name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return $this->data[$name] ?? null;
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function __set($name, $value)
    {
        $method = $this->methodName('set', $name, $value);

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }

        $this->data[$name] = $value;
    }

    /**
     * @param $prefix
     * @param $name
     * @return string
     */
    private function methodName($prefix, $name)
    {
        return $prefix . str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
    }
}
