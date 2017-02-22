<?php

declare(strict_types = 1);

namespace Domain\Repository\Eloquent;

use Domain\Entity\Contract as Entity;
use Domain\Exception\NotFoundRegisterException;
use Domain\Repository\RepositoryBase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package Domain\Repository\Eloquent
 */
abstract class Repository extends RepositoryBase
{
    /**
     * @param array $with
     * @return Collection
     */
    public function all(array $with = []): Collection
    {
        return $this->model->with($with)->get();
    }

    /**
     * @param int $id
     * @param array $with
     * @return Model
     * @throws NotFoundRegisterException
     */
    public function find(int $id, array $with = []): Model
    {
        $result = $this->model->with($with)->find($id);

        if (is_null($result)) {
            throw new NotFoundRegisterException('Register not found');
        }

        return $result;
    }

    /**
     * @param string $field
     * @param $value
     * @param array $with
     * @return Collection
     * @throws NotFoundRegisterException
     */
    public function findBy(string $field, $value, array $with = []): Collection
    {
        $result = $this->model->with($with)->where($field, '=', $value)->get();

        if ($result->count() === 0) {
            throw new NotFoundRegisterException('Register not found');
        }

        return $result;
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    public function delete(Entity $entity): bool
    {
        $model = $this->find($entity->getId());

        return $model->delete();
    }
}
