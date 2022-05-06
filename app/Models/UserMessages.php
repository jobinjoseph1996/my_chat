<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMessages extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_messages';
    protected $softDelete = true;

    public function user()
    {
        return $this->hasone('App\Models\User','id','user_id');
    }
}
