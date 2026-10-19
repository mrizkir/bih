<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorRecord extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public static function forIndicator(array $indicator): static
    {
        $model = new static;
        $model->setTable($indicator['table']);
        $model->timestamps = (bool) ($indicator['timestamps'] ?? false);
        $model->incrementing = (bool) ($indicator['incrementing'] ?? false);
        $model->primaryKey = $indicator['primary'][0];

        return $model;
    }
}
