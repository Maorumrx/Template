<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Order extends Model
{   
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id','order_type','bu_tb_code','due_date','created_by',
        'receive_qty','remain','qty','total_sales','state'
    ];
}