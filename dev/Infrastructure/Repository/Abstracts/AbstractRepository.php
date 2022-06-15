<?php

namespace Dev\Infrastructure\Repository\Abstracts;

use Illuminate\Database\Eloquent\Model;

/**
 * @method get()
 * @method create(array $data)
 * @method findOrFail($id)
 * @method find($id)
 * @method where(string $string, int $id)
 */
abstract class AbstractRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $method
     * @param $arguments
     * @return
     */
    public function __call($method, $arguments)
    {
      return  $this->model->{$method}(...$arguments);
    }

}
