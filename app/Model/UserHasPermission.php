<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class UserHasPermission extends Model {

    protected $table = 'user_has_permission';
    
    
}
