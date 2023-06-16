<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProfile extends Model
{
    use HasFactory;
    protected $table = 'tbl_profile';
    protected $primaryKey = 'id_profile';

    public function user()
    {
        return $this->belongsTo(MUser::class, 'id_user');
    }
}
