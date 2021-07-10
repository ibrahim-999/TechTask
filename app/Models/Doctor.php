<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable
{
    use Notifiable;
    protected $guard = 'doctor';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password' , 'remember_Token',
    ];

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

}
