<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $guarded = [];

    // const STATUS_PUBLIC = 1;
    // const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'name' => 'public',
            'class' => 'primary',
        ],
        0 => [
            'name' => 'private',
            'class' => 'danger',
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->active, '[N\A]');
    }
}
