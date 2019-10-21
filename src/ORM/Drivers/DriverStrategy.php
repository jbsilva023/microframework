<?php


namespace JbSilva\ORM\Drivers;

use JbSilva\ORM\Model;

interface DriverStrategy
{
    public function save(Model $data);
    public function insert(Model $data);
    public function update(Model $data);
    public function select(array $data = []);
    public function delete($data);
    public function exec(string $query = null);
    public function first();
    public function all();
}
