<?php

declare(strict_types = 1);

namespace Domain\Repository\Eloquent;

use App\Models\Bear;
use Domain\Entity\Contract as Entity;

/**
 * Class BearRepository
 * @package Domain\Repository\Eloquent
 */
class BearRepository extends Repository
{
    /**
     * @var Bear
     */
    protected $model;

    /**
     * BearRepository constructor.
     * @param Bear $model
     */
    public function __construct(Bear $model)
    {
        $this->model = $model;
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    public function create(Entity $entity): bool
    {
        $this->model->name = $entity->getName();
        $this->model->slug = $entity->getSlug();
        $this->model->type = $entity->getType();
        $this->model->danger_level = $entity->getDangerLevel();

        if ($save =  $this->model->save()) {
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
        $model = $this->find($entity->getId());

        $model->name = $entity->getName();
        $model->slug = $entity->getSlug();
        $model->type = $entity->getType();
        $model->danger_level = $entity->getDangerLevel();

        if ($update =  $model->save()) {
            $entity->setUpdatedAt($model->updated_at);
        }

        return $update;
    }
}
