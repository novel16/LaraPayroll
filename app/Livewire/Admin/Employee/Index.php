<?php

namespace App\Livewire\Admin\Employee;

use App\Http\Controllers\Admin\EmployeeController;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Schedule;
use Livewire\Component;

class Index extends Component
{
    public $employee_id;

    public function render()
    {
        $positions = Position::all();
        $schedules = Schedule::all();
        $employees = Employee::all();
        return view('livewire.admin.employee.index',['employees'=>$employees, 'positions' =>$positions, 'schedules'=>$schedules]);
    }

    public function deleteEmployee($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    public function destroyEmployee()
    {
        Employee::findOrFail($this->employee_id)->delete();
        session()->flash('message', 'Employee deleted successfully');
        $this->dispatch('close-modal');
    }
}
