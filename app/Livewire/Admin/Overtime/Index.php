<?php

namespace App\Livewire\Admin\Overtime;

use App\Models\Employee;
use App\Models\Overtime;
use Livewire\Component;

class Index extends Component
{
    public $employee_id, $date_of_overtime, $hours, $rate ,$overtime_id;

    public function render()
    {
        $employees = Employee::all();
        $overtime =Overtime::all();
        return view('livewire.admin.overtime.index', ['employees' => $employees, 'overtime' => $overtime])
                ->extends('layouts.admin')
                    ->section('content');
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|integer',
            'date_of_overtime' => 'required|date_format:Y-m-d',
            'hours' => 'required|integer',
            'rate' => 'required|numeric'
        ];
    }
    
    public function inputReset()
    {
        $this->employee_id = null;
        $this->date_of_overtime = null;
        $this->hours = null;
        $this->rate = null;
    }
    public function closeModal()
    {
        $this->inputReset();
    }
    public function openModal()
    {
        $this->inputReset();
    }



    public function storeOvertime()
    {
        $validatedData = $this->validate();

        Overtime::create([
            'employee_id' => $this->employee_id,
            'date_of_overtime' => $this->date_of_overtime,
            'hours' =>$this->hours,
            'rate' => $this->rate
            
        ]);

        session()->flash('message' , 'Overtime added successfully.');
        $this->dispatch('close-modal');
        $this->inputReset();
        


    }
    
    public function editOvertime(int $overtime_id)
    {
        $this->overtime_id = $overtime_id;

        $overtime = Overtime::findOrFail($overtime_id);

        $this->employee_id = $overtime->employee_id;
        $this->date_of_overtime = $overtime->date_of_overtime;
        $this->hours = $overtime->hours;
        $this->rate = $overtime->rate;

    }


    public function updateOvertime()
    {
        $validatedData = $this->validate();

        Overtime::findOrFail($this->overtime_id)->update([
            'employee_id' => $this->employee_id,
            'date_of_overtime' => $this->date_of_overtime,
            'hours' =>$this->hours,
            'rate' => $this->rate
            
        ]);

        session()->flash('message' , 'Overtime Updated successfully.');
        $this->dispatch('close-modal');
        $this->inputReset();
        
    }


    public function deleteOvertime($overtime_id)
    {
        $this->overtime_id = $overtime_id;
    }

    public function destroyOvertime()
    {
        Overtime::findOrFail($this->overtime_id)->delete();
        session()->flash('message' , 'Overtime deleted successfully.');
        $this->dispatch('close-modal');
        $this->inputReset();
    }
}
