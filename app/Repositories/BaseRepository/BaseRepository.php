<?php

namespace App\Repositories\BaseRepository;

use Ramsey\Uuid\Type\Integer;

class BaseRepository implements BaseRepositoryInterface
{

    protected $model;


    public function all(array $relations = [])
    {
        $query = ($this->model)::query();
        if (!empty($relations)) {
            $query->with($relations);
        }

        return $query->get();



    }

    public function paginate(Integer $page, $columns = ['*'], $pageName = 'page', $per_page = 50)
    {
        return ($this->model)::paginate($per_page, $columns, $pageName, $per_page);

    }

    public function find( $ID, array $columns = null)
    {
        return ($this->model)::find($ID);

    }


    public function store(array $item)
    {
        return ($this->model)::create($item);
    }

    public function storeMany(array $items)
    {
        return ($this->model)::createMany($items);

    }

    public function update($ID, array $item)
    {
        $query = $this->find($ID);
        return $query->update($item);

    }

    public function updateBy(array $criteria, array $data)
    {

        $query = ($this->model)::query();
        foreach ($criteria as $key => $value) {
            $query->where($key, $value);
        }

        return $query->update($data);

    }

    public function delete($ID)
    {
        if (intval($ID) > 0) {
            return ($this->model)::destroy($ID);
        }
        return null;
    }

    public function deleteBy(array $criteria)
    {
        $query = ($this->model)::query();
        foreach ($criteria as $key => $value) {
            $query->where($key, $value);
        }
        return $query->delete();
    }

    public function findBy(array $criteria, array $columns = null, $single = true)
    {
        $query = ($this->model)::query();
        foreach ($criteria as $key => $item) {
            $query->where($key,$item);
        }
        $method = $single ? 'first' : 'get';

        return is_null($columns) ? $query->{$method}() : $query->{$method}($columns);

    }
    public function findByOperationOrderByLast(array $criteria, array $columns = null, $single = true,array $relations = [])
    {
        $query = ($this->model)::query()->orderBy('updated_at','desc');
        foreach ($criteria as $key => $item) {
            $query->where($key,$item[0] ,$item[1]);
        }
        if (!empty($relations)) {
            $query->with($relations);
        }
        $method = $single ? 'first' : 'get';

        return is_null($columns) ? $query->{$method}() : $query->{$method}($columns);

    }

    public function findByWithOperation(array $criteria, array $columns = null, $single = true,array $relations = [])
    {
        $query = ($this->model)::query();
        foreach ($criteria as $key => $item) {
            $query->where($key,$item[0] ,$item[1]);
        }
        if (!empty($relations)) {
            $query->with($relations);
        }
        $method = $single ? 'first' : 'get';

        return is_null($columns) ? $query->{$method}() : $query->{$method}($columns);

    }

    public function findWith(int $id, $relations = [])
    {
        if (!empty($relations)) {
            return ($this->model)::with($relations)->where((new $this->model)->getKeyName(), $id)->get();
        }
        return ($this->model)::find($id);

    }

}
