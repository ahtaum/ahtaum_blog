<?php

namespace App\Repo\Tools;

interface ToolsInterface
{
    public function store(Array $data, string $type);
    public function editData(Array $data, string $type, int $id);
    public function deleteData(string $slug);
    public function searchData(Array $data);
}