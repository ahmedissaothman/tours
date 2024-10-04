<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'packages';

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'package_id';

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
        'name',
        'type_id',
        'price',
        'description',
        'image'
    ];

    public function type()
{
    return $this->belongsTo(PackageType::class, 'type_id', 'type_id');
}

public function bookings()
{
    return $this->hasMany(Booking::class, 'package_id');
}

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

}
