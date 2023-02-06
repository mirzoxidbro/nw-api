<?php


namespace Modules\Core\Repository;


class BaseRepository
{

    protected $entity;

    public function getQuery()
    {
        return $this->entity->query();
    }

    public function getById($id)
    {
        return $this->entity->find($id);
    }

    public function getPaginate($query, int $perPage = null)
    {
        if ($perPage)
            return $query->paginate($perPage);

        return $query->get();
    }

    public function store($params)
    {
        return $this->entity->create($params);
    }

    public function update(array $params, int $id)
    {
        $query = $this->getById($id);
        if ($query) {
            $query->update($params);
            return $query;
        } else {
            return false;
        }
    }

    public function destroy(int $id)
    {
        $entity = $this->getById($id);
        return ($entity) ? $entity->delete() : false;
    }

}
