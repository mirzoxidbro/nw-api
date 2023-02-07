<?php


namespace Modules\Core\Service;


use Illuminate\Database\Eloquent\Builder;

class BaseService
{
    protected $repo;

    protected $relation;

    protected $attributes;

    protected $sort_fields;

    public function get(array $params, $pagination = true)
    {
        $perPage = null;

        if ($pagination) {
            $perPage = $params['per_page'] ?? 20;
        }

        $query = $this->repo->getQuery();
        $query = $this->relation($query, $this->relation);
        $query = $this->filter($query, $this->filter_fields, $params);
        $query = $this->sort($query, $this->sort_fields, $params);
        $query = $this->select($query, $this->attributes);
        $query = $this->repo->getPaginate($query, $perPage);
        return $query;
    }

    public function relation(Builder $query, $relation = null)
    {
        if ($relation) {
            $query->with($relation);
        }
        return $query;
    }

    public function select(Builder $query, $attributes = null)
    {
        if ($attributes) {
            $query->select($attributes);
        }
        return $query;
    }


    public function filter(Builder $query, $filter_fields, $params)
    {
        foreach ($filter_fields as $key => $item) {
            if (array_key_exists($key, $params) && $params[$key]) {
                if ($item['type'] == 'string')
                    $query->where($key, 'ilike', '%' . $params[$key] . '%');
                if ($item['type'] == 'number')
                    $query->where($key, $params[$key]);
                if ($params[$key] and $item['type'] == 'json') {
                    if ($item['search'] == 'string')
                        $query->where('data->' . $key . '', 'ilike', $params[$key]);
                    if ($item['search'] == 'number')
                        $query->where('data->' . $key . '', $params[$key]);
                }
            }
        }
        return $query;
    }

    public function sort($query, $sort_fields = null, array $params): Builder
    {
        $key = 'id';
        $order = 'desc';
        if (isset($sort_fields) and isset($sort_fields['sort_key'])) {
            $key = $sort_fields['sort_key'];
            $order = $sort_fields['sort_type'];
        }
        if (isset($params) and isset($params['sort_key'])) {
            $key = $params['sort_key'];
            $order = $params['sort_type'];
        }
        $query->orderBy($key, $order);

        return $query;
    }

    public function create($params)
    {
        return $this->repo->store($params);
    }

    public function show($id)
    {
        return $this->repo->getById($id);
    }

    public function edit($params, $id)
    {
        return $this->repo->update($params, $id);

    }

    public function delete(int $id)
    {
        return $this->repo->destroy($id);
    }
}
