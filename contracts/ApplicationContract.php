<?php
namespace Check24Blog\Contracts;

/**
 * Interface ApplicationContract
 * @package Check24Blog\Contracts
 */
interface ApplicationContract{
    /**
     * @param ConfigProvider $facebook_config
     * @return mixed
     */
    public function run(ConfigProvider $facebook_config);
}