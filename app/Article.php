<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    protected $guarded = [];

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
