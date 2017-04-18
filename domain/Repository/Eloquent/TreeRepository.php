<?php

declare(strict_types = 1);

namespace Domain\Repository\Eloquent;

use App\Models\Tree;
use Domain\Entity\Contract as Entity;

/**
 * Class TreeRepository
 * @package Domain\Repository\Eloquent
 */
class TreeRepository extends  Repository
{
    /**
     * @var Tree
     */
    protected $model;

    /**
     * TreeRepository constructor.
     * @param Tree $model
     */
    public function __construct(Tree $model)
    {
        $this->model = $model;
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    public function create(Entity $entity): bool
    {
        $this->model->type = $entity->getType();
        $this->model->age = $entity->getAge();
        $this->model->bear_id = $entity->getBear()->getId();

        if ($save = $this->model->save()) {
            $entity->setId($this->model->id);
            $entity->setCreatedAt($this->model->created_at);
            $entity->setUpdatedAt($this->model->updated_at);
        }

        return $save;

    }

    public function update(Entity $entity): bool
    {
        $model = $this->find($entity->getId());

        $model->type = $entity->getType();
        $model->age = $entity->getAge();
        $model->bear_id = $entity->getBear()->getId();

        if ($update = $model->save()) {
            $entity->setUpdatedAt($model->updated_at);
        }

        return $update;
    }
}
