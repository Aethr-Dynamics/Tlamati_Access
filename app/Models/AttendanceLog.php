<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AttendanceLog
 *
 * @property $id
 * @property $user_type
 * @property $id_student
 * @property $id_worker
 * @property $id_visitor
 * @property $action
 * @property $accessed_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @property Visitor $visitor
 * @property Worker $worker
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AttendanceLog extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type', 
        'id_student', 
        'id_worker', 
        'id_visitor', 
        'action', 
        'accessed_at'];

    protected $casts = [
        'accessed_at' => 'datetime',
    ];

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
