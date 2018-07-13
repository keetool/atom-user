<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected $model;

    /**
     * Constructor bind model to repo
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function queryAllOrderBy($field, $order = "asc")
    {

        return $this->model->orderBy($field, $order)->get();
    }

    /**
     *  Get all instance of model
     */
    public function all()
    {
        return $this->model->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $record = $this->show($id);
        return $record->update($data);
    }

    // remove record from the database

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function loadAfterModelId($modelId, $models, $limit = 20, $order = "desc")
    {
        if ($limit == null)
            $limit = 20;
        if ($order == null) {
            $order = "desc";
        }
        if ($models == null) {
            $models = clone $this->model;
        }

        $time = $this->show($modelId)->created_at;
        $models = $models->where("created_at", "<", $time);

        $models = $models->orderBy("created_at", $order)->limit($limit)->paginate($limit);
        return $models;
    }

}
