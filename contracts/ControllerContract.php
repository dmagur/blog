<?php
namespace Check24Blog\Contracts;

/**
 * Interface ControllerContract
 * @package Check24Blog\Contracts
 */
interface ControllerContract{
    /**
     * @param string $view
     * @param string $layout
     * @param array $data
     * @return mixed
     */
    public function out(string $view,string $layout,array $data);

    /**
     * @param string $path
     * @return mixed
     */
    public function redirect(string $path);
}