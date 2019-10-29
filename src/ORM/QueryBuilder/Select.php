<?php


namespace JbSilva\ORM\QueryBuilder;

use JbSilva\ORM\Filters\Join;
use JbSilva\ORM\Filters\Where;

class Select implements QueryBuilderInterface
{
    use Where;
    use Join;

    private $query;
    private $values = [];

    public function __construct(string $table, array $conditions = [], array $junctions = [], $model = null)
    {
        $this->query = $this->makeSql($table, $conditions, $junctions, $model);
    }

    private function makeSql($table, $conditions, $junctions, $model)
    {
        $sql = sprintf('SELECT * FROM %s', $table);

        if ($junctions) {
            $sql = sprintf('SELECT %s.* FROM %s', $model->table, $table);
            $sql .= $this->makeJunction($junctions, $model);
        }

        if ($conditions) {
            $sql .= $this->makeWhere($conditions);
        }

        return $sql;
    }

    public function getvalues(): array
    {
        return $this->values;
    }

    public function __toString()
    {
        return $this->query;
    }
}
