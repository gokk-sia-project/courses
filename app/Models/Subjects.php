<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Subjects extends Model{

    protected $table = 'subjects';
    protected $fillable = [
        'subject_name',
    ];

    public $timestamps = false;
    protected $primaryKey = 'subject_id';

}