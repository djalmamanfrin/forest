<?php

declare(strict_types = 1);

namespace Domain\Repository\Eloquent;

use App\Models\Fish;
use Domain\Entity\Contract as Entity;

/**
 * Class FishRepository
 * @package Domain\Repository\Eloquent
 */
class FishRepository extends Repository
{
    /**
     * @var Fish
     */
    protected $model;

    /**
     * FishRepository constructor.
     * @param Fish $model
     */
    public function __construct(Fish $model)
    {
        $this->model = $model;
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    public function create(Entity $entity): bool
    {
        $this->model->weight = $entity->getWeight();
        $this->model->bear_id = $entity->getBear()->getId();

        if ($save = $this->model->save()) {
            $entity->setId($this->model->id);
            $entity->setCreatedAt($this->model->created_at);
            $entity->setUpdatedAt($this->model->updated_at);
        }

        return $save;
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    public function update(Entity $entity): bool
    {
        $model = $this->find($this->getId());

        $model->weight = $entity->getWeight();
        $model->bear_id = $entity->getBear()->getId();

        if ($update = $model->save()) {
            $entity->setUpdated($model->updated_at);
        }

        return $update;
    }
}
