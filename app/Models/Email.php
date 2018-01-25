<?php

namespace App\Models;

use App\Helpers\Traits\ModelInspectTrait;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use ModelInspectTrait;

    protected $fillable = [
        'address',
        'user_id'
    ];


    protected function user() {
        return $this->belongsTo(User::class);
    }
}
