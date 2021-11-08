<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HealthTracker
 * @package App\Models
 * @version October 25, 2021, 4:25 am UTC
 *
 * @property string $name
 * @property number $weight
 * @property string $blood_pressure
 * @property string $diagnosis
 */
class HealthTracker extends Model
{

    use HasFactory;

    public $table = 'health_tracker';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'weight',
        'blood_pressure',
        'diagnosis'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'weight' => 'decimal:2',
        'blood_pressure' => 'string',
        'diagnosis' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'weight' => 'required|numeric',
        'blood_pressure' => 'required|string|max:255',
        'diagnosis' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
