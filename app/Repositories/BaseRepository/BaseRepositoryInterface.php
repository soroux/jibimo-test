<?php

namespace App\Repositories\BaseRepository;

use Ramsey\Uuid\Type\Integer;

interface BaseRepositoryInterface
{
    public function all(array $relations = []);

    public function paginate(integer $page, $columns = ['*'], $pageName = 'page', $per_page =50);

    public function find(integer $ID, array $columns = null);

    public function findBy(array $criteria, array $columns = null, $single = true);

    public function store(array $item);

    public function storeMany(array $items);

    public function update($ID, array $item);

    public function updateBy(array $criteria, array $data);

    public function delete($ID);

    public function deleteBy(array $criteria);

}
