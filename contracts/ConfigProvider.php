<?php
namespace Check24Blog\Contracts;

/**
 * Interface ConfigProvider
 * @package Check24Blog\Contracts
 */
interface ConfigProvider{
    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name);
}