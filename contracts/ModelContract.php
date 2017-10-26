<?php
namespace Check24Blog\Contracts;

/**
 * Interface ModelContract
 * @package Check24Blog\Contracts
 */
interface ModelContract{
    /**
     * @param array $data
     * @return int
     */
    public function insert(array $data): int;

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool;

    /**
     * @param int $id
     * @return array|null
     */
    public function get(int $id): ?array;
}