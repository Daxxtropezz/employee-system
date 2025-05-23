<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'contact', 'birthdate', 'sex'];

    public $timestamps = true;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Manila');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Manila');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = Carbon::now('Asia/Manila');
            $model->updated_at = Carbon::now('Asia/Manila');
        });

        static::updating(function ($model) {
            $model->updated_at = Carbon::now('Asia/Manila');
        });

        // Log creation
        static::created(function ($employee) {
            Log::create([
                'action' => 'Record successfully created for employee #' . $employee->id . '.',
                'sys_table' => 'Employee',
                'table_id' => $employee->id,
                'changes' => null,
            ]);
        });

        // Log update
        static::updated(function ($employee) {
            Log::create([
                'action' => 'Record successfully updated for employee #' . $employee->id . '.',
                'sys_table' => 'Employee',
                'table_id' => $employee->id,
                'changes' => json_encode($employee->getChanges()),
            ]);
        });

        // Log deletion
        // static::deleted(function ($employee) {
        //     Log::create([
        //         'action' => 'Record permanently removed employee #' . $employee->id . '.',
        //         'table' => 'Employee',
        //         'table_id' => $employee->id,
        //         'changes' => null,
        //     ]);
        // });
    }
}
