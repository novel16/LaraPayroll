<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function create(){

        $positions = Position::all();
        $schedules = Schedule::all();
        
        return view('admin.employee.create', compact('positions', 'schedules'));

    }

    public function store(EmployeeFormRequest $request)
    {
        $validatedData = $request->validated();

        // dd($request);
    
        // Retrieve the position and schedule based on the IDs from the form data
        $position = Position::findOrFail($validatedData['position_id']);
        $schedule = Schedule::findOrFail($validatedData['schedule_id']);

        $employee = Employee::create([
             'employee_id' => $validatedData['employee_id'],
             'firstname' => $validatedData['firstname'],
             'lastname' => $validatedData['lastname'],
             'address' => $validatedData['address'],
             'birthdate' => $validatedData['birthdate'],
             'contact' => $validatedData['contact'],
             'gender' => $validatedData['gender'],
             'position_id' => $position->id,
             'schedule_id' => $schedule->id,


        ]);

        // Create a new Employee instance
        // $employee = new Employee([
        //     'employee_id' => $validatedData['employee_id'],
        //     'firstname' => $validatedData['firstname'],
        //     'lastname' => $validatedData['lastname'],
        //     'address' => $validatedData['address'],
        //     'birthdate' => $validatedData['birthdate'],
        //     'contact' => $validatedData['contact'],
        //     'gender' => $validatedData['gender'],
        // ]);

        // Associate the position and schedule with the employee
        // $employee->position()->associate($position);
        // $employee->schedule()->associate($schedule);

        // Save the employee to the database
        

        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            
            $employee->image = $filename;
            $file->move('uploads/employee/',$filename);
        }
        $employee->save();
        return redirect('admin/employees')->with('message', 'Employee added successfully!');
    }

    public function edit(Employee $employee)
    {
        $positions = Position::all();
        $schedules = Schedule::all();

        return view('admin.employee.edit', compact('employee', 'positions', 'schedules'));


    }

    public function update(EmployeeFormRequest $request, $employee_id){
        
        $validatedData = $request->validated();

        // dd($request);
    
        // Retrieve the position and schedule based on the IDs from the form data
        $position = Position::findOrFail($validatedData['position_id']);
        $schedule = Schedule::findOrFail($validatedData['schedule_id']);

        $employee = Employee::findOrFail($employee_id);

            $employee->update([
             'employee_id' => $validatedData['employee_id'],
             'firstname' => $validatedData['firstname'],
             'lastname' => $validatedData['lastname'],
             'address' => $validatedData['address'],
             'birthdate' => $validatedData['birthdate'],
             'contact' => $validatedData['contact'],
             'gender' => $validatedData['gender'],
             'position_id' => $position->id,
             'schedule_id' => $schedule->id,

        ]);

        if($request->hasFile('image')){

            $path = 'uploads/employee/'.$employee->image;
            if(File::exists($path)){
                File::delete($path);

            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $employee->image = $filename;
            $file->move('uploads/employee/',$filename);
            
            $employee->save();
        }
            
            return redirect('admin/employees')->with('message', 'Employee updated successfully!');

    }
}
