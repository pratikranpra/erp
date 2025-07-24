<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('employee_id')) {
    function employee_id() {
        return Auth::guard('employee')->id() ?? 0;
    }
}

if (!function_exists('employee_data')) {
    function employee_data() {
        return \App\Models\Employee::with('role')
            ->where('id', employee_id())
            ->first();
    }
}
