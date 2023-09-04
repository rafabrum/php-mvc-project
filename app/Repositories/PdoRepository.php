<?php

namespace App\Repositories;

use App\Database\Database;
use phpDocumentor\Reflection\Types\Mixed_;

class PdoRepository
{
    private $connection;
    protected $table;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function insert($model)
    {
        $table = $model->table();
        $params = implode(', ', $model->getColumns());
        $columns = str_replace(":", "", $params);

        $stmt = $this->connection->prepare("INSERT INTO $table ($columns) VALUES ($params)");
        $stmt->execute($model->getValues());

        return $this->connection->lastInsertId();
    }

    public function findBy(string $column, $value, array $fields = ['*'])
    {
        $fields = implode(', ', $fields);

        $query = $this->connection->prepare("select $fields from {$this->table} where {$column} = :value");
        $query->bindParam(':value', $value);

        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}