<?php


namespace JbSilva\ORM\Filters;


trait Pagination
{
    public function makePagination(array $paginate): string
    {
        $init = $paginate[0];
        $max = $paginate[1];

        $sql = sprintf(' LIMIT %s, %s', $init, $max);

        return $sql;
    }

}