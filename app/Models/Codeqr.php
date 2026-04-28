<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Codeqr
 *
 * @property $id
 * @property $id_student
 * @property $id_worker
 * @property $id_visitor
 * @property $codeqr
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @property Visitor $visitor
 * @property Worker $worker
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codeqr extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_student', 'id_worker', 'id_visitor', 'codeqr'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'id_student', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visitor()
    {
        return $this->belongsTo(\App\Models\Visitor::class, 'id_visitor', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(\App\Models\Worker::class, 'id_worker', 'id');
    }
    
}
