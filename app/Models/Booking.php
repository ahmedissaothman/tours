<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'bookings';

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'booking_id';

    /**
    * Indicates if the model's ID is not auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = true;

    /**
    * The data type of the auto-incrementing ID.
    *
    * @var string
    */
    protected $keyType = 'integer';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'customer_name',
        'customer_email',
        'phone_number',
        'number_of_children',
        'number_of_adult',
        'booking_date',
        'status',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id',);
    }

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];
}
