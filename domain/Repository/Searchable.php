<?php

declare(strict_types = 1);

namespace Domain\Repository;

/**
 * Class Searchable
 * @package Domain\Repository
 */
interface Searchable
{
    /**
     * @param array $with
     * @return mixed
     */
    public function all(array $with = []);

    /**
     * @param int $id
     * @param array $with
     * @return mixed
     */
    public function find(int $id, array $with = []);

    /**
     * @param string $field
     * @param $value
     * @param array $with
     * @return mixed
     */
    public function findBy(string $field, $value, array $with = []);

    /**
     * @param int $per_page
     * @return mixed
     */
    public function paginate(int $per_page = 15);
}
