<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;
use App\Models\Menu;

class Cart extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "carts";

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'order_id',
        'menu_id',
        'price',
        'qty',
        'total'
    ];

    public function Order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function Menu() {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
