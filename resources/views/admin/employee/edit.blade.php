@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Employees List
                        <a href="{{ url('admin/employees') }}" class="btn btn-sm btn-danger text-light rounded-0 float-end">Back</a>
                    </h4>
                </div>
                <form action="{{ url('admin/employees/'.$employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Employee ID</label>
                                    <input type="text" name="employee_id" value="{{ $employee->employee_id }}" class="form-control">
                                    @error('employee_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Firstname</label>
                                    <input type="text" name="firstname" value="{{ $employee->firstname }}" class="form-control">
                                    @error('firstname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Lastname</label>
                                    <input type="text" name="lastname" value="{{ $employee->lastname }}" class="form-control">
                                    @error('lastname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Birthdate</label>
                                    <input type="date" name="birthdate" value="{{ $employee->birthdate }}" class="form-control">
                                    @error('birthdate')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >Address</label>
                                    <textarea type="text" name="address" rows="4" class="form-control">{{ $employee->address }}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Contact</label>
                                    <input type="text" name="contact" value="{{ $employee->contact }}" class="form-control">
                                    @error('contact')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Gender</label>
                                    <select name="gender" class="form-select" id="">
                                        <option value="{{ $employee->gender }}">
                                            {{ $employee->gender }}
                                        </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Position</label>
                                    <select name="position_id" class="form-select" id="">
                                        
                                        @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" {{ $position->id == $employee->position_id ? 'selected' : '' }} >
                                            {{ $position->description }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('position_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Schedule</label>
                                    <select name="schedule_id" class="form-select" id="">
                                       
                                        @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}"  {{ $schedule->id == $employee->schedule_id ? 'selected' : '' }}>
                                            
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_in)->format('h:i A') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_out)->format('h:i A') }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('schedule_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    @if ($employee->image)
                                        <img src="{{ asset('uploads/employee/'.$employee->image) }}" style="width: 100px;height:100px; border-radius:50%;">
                                    @endif
                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary text-light rounded-0 float-end" > Update </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection