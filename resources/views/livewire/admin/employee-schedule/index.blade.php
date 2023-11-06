<div>
    @include('livewire.admin.employee-schedule.modal-form')
   
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Schedule
                            <a href="#" class="btn btn-sm btn-primary text-light rounded-0 float-end">Print</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Schedule</th>
                                    <th>tools</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td hidden>{{ $employee->id }}</td>
                                        <td>{{ $employee->employee_id }}</td>
                                        <td>
                                            {{ $employee->firstname }} {{ $employee->lastname }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $employee->schedule->time_in)->format('h:i A') }} - 
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $employee->schedule->time_out)->format('h:i A') }}
                                        </td>
                                        <td>
                                            <a href="#" wire:click ="editEmployeeSched({{ $employee->id }})" data-bs-toggle="modal" data-bs-target="#modalEditEmployeeSched" class="btn btn-sm rounded-0 btn-success">Edit</a>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
