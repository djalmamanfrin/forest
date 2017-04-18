<?php

declare(strict_types = 1);

namespace Domain\Repository;

/**
 * Class RepositoryBase
 * @package Domain\Repository
 */
abstract class RepositoryBase implements Recordable, Searchable
{
    /**
     * @var array
     */
    protected $with = [];

    /**
     * @return array
     */
    public function getWith(): array
    {
        return $this->with;
    }

    /**
     * @param array $with
     * @return RepositoryBase
     */
    public function with(array $with): self
    {
        $this->with = $with;
        return $this;
    }
}
