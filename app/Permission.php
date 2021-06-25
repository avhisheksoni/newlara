<?php

namespace App;

use Laratrust\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $table= 'permissions';
    protected $guarded = [];
    public $timestamps = true;
}
