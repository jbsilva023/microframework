<?php


namespace JbSilva\ORM\Filters;


trait Join
{
    public function makeJunction(array $junctions, $model) :string
    {
        $sql = '';

        foreach ($junctions as $junction) {
            $table = $junction[0];
            $foreignKey = $junction[1];

            if (isset($junction[2])) {
                $foreignKey = $junction[1];;
            }

            $sql .= $model->getTable() . '.id' . ' = ' . $table . '.' . $foreignKey;
            //$sql .=  $table . '.' . $foreignKey . ' = ' . $model->getTable() . '.id';
        }

        $join = sprintf(' INNER JOIN %s ON (%s)', $model->getTable(), $sql);
        return $join;
    }
}