<?php

namespace App\Helpers\Traits;


trait ModelInspectTrait
{
    /**
     * Retrieves the table name associated with the model
     *
     * @return string
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
