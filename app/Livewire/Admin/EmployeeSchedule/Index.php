<?php

namespace App\Livewire\Admin\EmployeeSchedule;

use App\Models\Employee;
use App\Models\Schedule;
use Livewire\Component;

class Index extends Component
{
    public $employee_id, $firstname, $schedule_id;
    
    public function render()
    {

        $schedules = Schedule::all();
        $employees = Employee::all();
        return view('livewire.admin.employee-schedule.index',['employees' => $employees, 'schedules' => $schedules])
                        ->extends('layouts.admin')
                            ->section('content');
    }

    public function editEmployeeSched(int $employee_id)
    {
        $this->employee_id = $employee_id;

        // $schedules = Schedule::all();
    
        $employee = Employee::findOrFail($employee_id);
        $this->firstname = $employee->firstname.' '.$employee->lastname;
        $this->schedule_id = $employee->schedule_id;
    
       
    }

    
}
