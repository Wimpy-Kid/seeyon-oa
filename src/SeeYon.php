<?php


namespace SeeYon;

/**
 * @property Form $form
 * @property Members $members
 *
 * Class SeeYon
 * @package app\Support\SeeYon\src
 */
class SeeYon {

    public function __get($name) {
        $className = __NAMESPACE__ . '\\' . ucfirst($name);
        $this->$name = new $className;
        return $this->$name;
    }

}
