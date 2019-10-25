<?php


namespace JbSilva\ORM\QueryBuilder;


class Select implements QueryBuilderInterface
{
    private $query;
    private $values = [];

    public function __construct(string $table)
    {
        $this->query = sprintf('SELECT * FROM %s', $table);
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