<?php


namespace JbSilva\ORM\Filters;


trait Join
{
    public function makeJuntion(array $junctions, $model) :string
    {
        $sql = '';
        $values = [];

        foreach ($junctions as $junction) {
            $table = $junction[0];
            $foreignKey = $junction[1];

            if (isset($junction[2])) {
                $foreignKey = $junction[1];;
            }

            $sql .= $model->getTable() . '.id' . ' = ' . $table . '.' . $foreignKey;
        }

        $join = sprintf(' INNER JOIN %s ON (%s)', $table, $sql);
        return $join;
    }
}