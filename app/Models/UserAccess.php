<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class UserAccess extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'email', 'password', 'user_data', 'user_type', 'remember_token'];

    public static function boot()
    {
        parent::boot();

        // Log creation
        static::created(function ($employee) {
            Log::create([
                'action' => 'New Record successfully created for employee #' . $employee->id . '.',
                'sys_table' => 'Employee',
                'table_id' => $employee->id,
                'changes' => null,
            ]);
        });

        // Log update
        static::updated(function ($employee) {
            Log::create([
                'action' => 'New Record successfully updated for employee #' . $employee->id . '.',
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
