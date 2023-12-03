<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'inquiries';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'    => 'required',
        'email'   => 'required|regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i',
        'mobile'  => 'required|digits:10',
        'message' => 'required',
    ];

    /**
     * @var string[]
     */
    public $fillable = [
        'name', 'email', 'mobile', 'message',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'name'    => 'string',
        'email'   => 'string',
        'mobile'  => 'string',
        'message' => 'string',
    ];
}
