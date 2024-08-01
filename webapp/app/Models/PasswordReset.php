<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class PasswordReset extends Model
{   
    use SoftDeletes;

    protected $table = "password_resets";

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
       "user_id",
       "token",
       "status",
       "expired_at",
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

}