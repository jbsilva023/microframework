<?php


namespace JbSilva\ORM\QueryBuilder;

use JbSilva\ORM\Filters\Where;

class Update implements QueryBuilderInterface
{
    use Where;

    protected $query;
    protected $values = [];

    public function __construct($table, $conditions)
    {
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
