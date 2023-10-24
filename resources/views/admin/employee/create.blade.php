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
                <form action="{{ url('admin/employees') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Employee ID</label>
                                    <input type="text" name="employee_id" class="form-control">
                                    @error('employee_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Firstname</label>
                                    <input type="text" name="firstname" class="form-control">
                                    @error('firstname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Lastname</label>
                                    <input type="text" name="lastname" class="form-control">
                                    @error('lastname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Birthdate</label>
                                    <input type="date" name="birthdate" class="form-control">
                                    @error('birthdate')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >Address</label>
                                    <textarea type="text" name="address" rows="4" class="form-control"></textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                    @error('contact')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Gender</label>
                                    <select name="gender" class="form-select" id="">
                                        <option value="">--Select Gender--</option>
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
                                        <option value="">--Select Position--</option>
                                        @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->description }}</option>
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
                                        <option value="">--Select Schedule--</option>
                                        @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}">
                                            {{-- {{ $schedule->time_in }} --}}
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
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary text-light rounded-0 float-end" > Save </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection