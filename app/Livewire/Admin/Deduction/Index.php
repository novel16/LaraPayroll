<?php

namespace App\Livewire\Admin\Deduction;

use App\Models\Deduction;
use Livewire\Component;
use Spatie\FlareClient\Flare;

class Index extends Component
{
    public $description, $amount, $deduction_id;

    public function render()
    {
        $deductions = Deduction::all();
        return view('livewire.admin.deduction.index',['deductions' => $deductions])
                ->extends('layouts.admin')
                    ->section('content');
    }

    public function rules() {

        return [

            'description' => 'required|string',
            'amount' => 'required|numeric'

        ];
        
    }

    public function resetInput()
    {
        $this->description = null;
        $this->amount = null;
    }

    public function openModal() {
        
        $this->resetInput();

    }
    public function closeModal() {
        
        $this->resetInput();

    }
    public function storeDeduction(){
        
        $validatedData = $this->validate();

        Deduction::create([
            'description' => $this->description,
            'amount' => $this->amount
        ]);

        session()->flash('message', 'Deduction Added Successfully!');
        $this->dispatch('close-modal');
        $this->resetInput();

    }

    public function editDeduction(int $deduction_id)
    {
        $this->deduction_id = $deduction_id;

        $deduction = Deduction::findOrfail($deduction_id);
        $this->description = $deduction->description;
        $this->amount = $deduction->amount;
    }

    public function updateDeduction()
    {
        $validatedData = $this->validate();

        Deduction::findOrFail($this->deduction_id)->update([
            'description' => $this->description,
            'amount' => $this->amount
        ]);

        session()->flash('message', 'Deduction Updated Successfully!');
        $this->dispatch('close-modal');
        $this->resetInput();
    }


    public function deleteDeduction($deduction_id)
    {
        $this->deduction_id = $deduction_id;
    }

    public function destroyDeduction()
    {
        Deduction::findOrFail($this->deduction_id)->delete();
        session()->flash('message', 'Deduction Deleted Successfully!');
        $this->dispatch('close-modal');
        $this->resetInput();
    }
}
