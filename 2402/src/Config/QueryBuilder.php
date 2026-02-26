<?php
class QueryBuilder
{
    protected string $table;
    protected array $data;

    public function insert(string $table, array $data): self
    {
        $this->table = $table;
        $this->data = $data;
        return $this;
    }

    public function getSQL(): string
    {
        $fields = implode(", ", array_keys($this->data));
        $placeholders = ":" . implode(", :", array_keys($this->data));

        return "INSERT INTO {$this->table} ($fields) VALUES ($placeholders)";
    }

    public function getParams(): array
    {
        return $this->data;
    }
}
