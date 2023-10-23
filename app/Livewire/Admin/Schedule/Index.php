<?php

namespace App\Livewire\Admin\Schedule;

use App\Models\Schedule;
use Livewire\Component;

class Index extends Component
{

    public $time_in, $time_out, $schedule_id;

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.admin.schedule.index', ['schedules' => $schedules])
                    ->extends('layouts.admin')
                        ->section('content');

    }

    public function rules()
    {
        return [
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i'
        ];
    }
    public function inputReset()
    {
        $this->time_in = null;
        $this->time_out = null;
    }
    public function closeModal()
    {
        $this->inputReset();
    }
    public function openModal()
    {
        $this->inputReset();
    }

    public function storeSchedule()
    {
        $validatedData = $this->validate();

        Schedule::create([

            'time_in' => $this->time_in,
            'time_out' => $this->time_out

        ]);
        session()->flash('message', 'Schedule Added Successfully.');
        $this->dispatch('close-modal');
        $this->inputReset();

    }

    public function editSchedule(int $schedule_id)
    {
        $this->schedule_id = $schedule_id;

        $schedule = Schedule::findOrFail($schedule_id);
        $this->time_in = $schedule->time_in;
        $this->time_out = $schedule->time_out;
    }

    public function updateSchedule()
    {
        // $validatedData = $this->validate();

        Schedule::findOrFail($this->schedule_id)->update([

            'time_in' => $this->time_in,
            'time_out' => $this->time_out

        ]);
        session()->flash('message', 'Schedule Updated Successfully.');
        $this->dispatch('close-modal');
        $this->inputReset();
    }

    public function deleteSchedule($schedule_id)
    {
        $this->schedule_id = $schedule_id;
    }

    public function destroySchedule()
    {
        Schedule::findOrFail($this->schedule_id)->delete();
        session()->flash('message', 'Schedule Deleted Successfully.');
        $this->dispatch('close-modal');
        $this->inputReset();
    }

}
