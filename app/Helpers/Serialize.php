<?php

namespace App\Helpers;

trait Serialize {

    static function toSerialized(array $data) {
        return serialize($data);
    }
}