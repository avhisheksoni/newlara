<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
   protected $table= 'roles';
    protected $guarded = [];
    public $timestamps = true;
}
