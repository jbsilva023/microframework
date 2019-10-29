<?php


namespace JbSilva\ORM\Filters;

use JbSilva\ORM\QueryBuilder\Select;

trait RelationsShips
{
    /**
     * @param $table
     * @param null $foreingKey
     * @param null $otherkey
     * @return mixed
     */
    public function hasOne($table, $foreingKey = null, $otherkey = null)
    {
        $model = new $table;
        $foreingKey = $foreingKey ?? substr($this->getTable(), 0, strlen($this->getTable()) -1)  . '_id';

        $conditions[] = ["{$this->getTable()}.id", $this->id];
        $junctions[] = [$this->getTable(), $foreingKey, $otherkey];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions, $junctions, $model))
            ->exec()
            ->first();

        $class = new $table;

        if ($data) {
            $class->setAll($data);
        } else {
            $class->setAll([]);
        }

        return $class;
    }

    /**
     * @param $table
     * @param null $foreingKey
     * @param null $otherkey
     * @return mixed
     */
    public function hasMany($table, $foreingKey = null, $otherkey = null)
    {
        $collection = [];

        $model = new $table;
        $foreingKey = $foreingKey ?? substr($this->getTable(), 0, strlen($this->getTable()) -1)  . '_id';

        $conditions[] = ["{$this->getTable()}.id", $this->id];
        $junctions[] = [$this->getTable(), $foreingKey, $otherkey];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions, $junctions, $model))
            ->exec()
            ->all();

        if ($data) {
            foreach ($data as $given) {
                $class = new $table;
                $class->setAll($given);
                $collection[] = $class;
            }
        } else {
            $class = new $table;
            $class->setAll([]);
            $collection[] = $class;
        }

        return $collection;
    }

    /**
     * @param $table
     * @param null $foreingKey
     * @param null $otherkey
     * @return mixed
     */
    public function belongsTo($table, $foreingKey = null, $otherkey = null)
    {
        $model = new $table;
        $primariKey = 'id';

        $foreingKey = $foreingKey ?? substr($this->getTable(), 0, strlen($this->getTable()) -1)  . '_id';

        if (!is_null($this->primariKey)) {
            $primariKey = $this->primariKey;
        }

        $conditions[] = ["{$this->getTable()}.{$primariKey}", $this->$primariKey];
        $junctions[] = [$this->getTable(), $primariKey, $foreingKey, $otherkey];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions, $junctions, $model))
            ->exec()
            ->first();

        $class = new $table;

        if ($data) {
            $class->setAll($data);
        } else {
            $class->setAll([]);
        }

        return $class;
    }

    /**
     * @param $table
     * @param null $foreingKey
     * @param null $otherkey
     * @return mixed
     */
    public function belongsToMany($table, $foreingKey = null, $otherkey = null)
    {
        $collection = [];

        $model = new $table;
        $foreingKey = $foreingKey ?? substr($this->getTable(), 0, strlen($this->getTable()) -1)  . '_id';

        $conditions[] = ["{$this->getTable()}.id", $this->id];
        $junctions[] = [$this->getTable(), $foreingKey, $otherkey];

        $data = $this->driver
            ->setQueryBuilder(new Select($this->getTable(), $conditions, $junctions, $model))
            ->exec()
            ->all();

        if ($data) {
            foreach ($data as $given) {
                $class = new $table;
                $class->setAll($given);
                $collection[] = $class;
            }
        } else {
            $class = new $table;
            $class->setAll([]);
            $collection[] = $class;
        }

        return $collection;
    }
}
