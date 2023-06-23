<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// class MUser extends Model
// {
    // use HasFactory;
class MUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';

    public function role()
    {
        return $this->belongsTo(MRole::class, 'id_role');
    }
    public function getProfileAttribute()
    {
        // return $this->belongsTo(MProfile::class, 'id_profile');
        $profile = MProfile::where('id_user', '=', $this->id_user)->latest()->first();
        return $profile;
    }
}
