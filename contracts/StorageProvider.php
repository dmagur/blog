<?php
namespace Check24Blog\Contracts;

/**
 * Interface StorageProvider
 * @package Check24Blog\Contracts
 */
interface StorageProvider{
    /**
     * @return mixed
     */
    public function connect();
}