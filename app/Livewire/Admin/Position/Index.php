<?php

namespace App\Livewire\Admin\Position;

use App\Models\Position;
use Livewire\Component;

class Index extends Component
{

    public $description, $rate, $position_id;

    public function render()
    {
        $positions = Position::all();
        return view('livewire.admin.position.index',['positions' => $positions])
                ->extends('layouts.admin') 
                ->section('content');
    }

    public function rules()
    {
        return [
            'description' => 'required|string',
            'rate' => 'required|numeric'
        ];
    }

    public function resetInput()
    {
        $this->description = null;
        $this->rate = null;
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function openModal()
    {
        $this->resetInput();
    }


    public function storePosition()
    {
        $validatedData = $this->validate();

        Position::create([
            'description' => $this->description,
            'rate' => $this->rate
        ]);

        session()->flash('message', 'Position Added Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
        
    }
    public function editPosition($position_id)
    {
        $this->position_id = $position_id;
        $position = Position::findOrFail($position_id);

        $this->description = $position->description;
        $this->rate = $position->rate;

       
    }

    public function updatePosition()
    {
        $validatedData = $this->validate();

        Position::findOrFail($this->position_id)->update([
            'description' => $this->description,
            'rate' => $this->rate
        ]);

        session()->flash('message', 'Position Updated Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }



    public function deletePosition($position_id)
    {
        $this->position_id = $position_id;
    }

    public function destroyPosition()
    {
        Position::findOrFail($this->position_id)->delete();
        session()->flash('message', 'Position Deleted Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }


}
