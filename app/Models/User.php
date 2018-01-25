<?php

namespace App\Models;

use App\Helpers\Traits\ModelInspectTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ModelInspectTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'date_of_birth',
    ];

    protected $dates = [
        "date_of_birth"
    ];

    public function emails() {
        return $this->hasMany(Email::class);
    }
}
