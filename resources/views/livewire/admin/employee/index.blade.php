<div>
    {{-- @include('livewire.admin.employee.image-form-modal') --}}
    
    <div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="modalDeleteEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent = "destroyEmployee">
                        
                        <div class="modal-body">
                            
                            <div class="my-2">
                                <h5>Are you sure, you want to delete this employee? </h5>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes. Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


   

    
    <div class="row">

       

        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        Employees List
                        <a href="{{ url('admin/employees/create') }}" class="btn btn-sm btn-primary text-light rounded-0 float-end">New</a>
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-striped ">

                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Photo</th>
                                <th> Name</th>
                                <th>Position</th>
                                <th>Schedule</th>
                                <th>Member Since</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employees as $employee)

                                <tr>
                                    <td>{{ $employee->employee_id }}</td>
                                    <td style="position: relative; index:3;">
                                        @if ($employee->image)
                                            <img src="{{ asset('uploads/employee/'.$employee->image) }}">
                                        @else
                                            <img src="{{ asset('uploads/employee/default-img.jpg') }}">
                                        @endif
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditImageEmployee" class="btn btn-sm text-success rounded-0 " style="top: 0;  position:absolute;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                                    <td>{{ $employee->position->description }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $employee->schedule->time_in)->format('h:i A') }} - 
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $employee->schedule->time_out)->format('h:i A') }}
                                    </td>
                                    <td>{{ $employee->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ url('admin/employees/'.$employee->id.'/edit') }}" class="btn btn-sm btn-success rounded-0">Edit</a>
                                        <a href="#" wire:click = "deleteEmployee({{ $employee->id }})" data-bs-toggle="modal" data-bs-target="#modalDeleteEmployee" class="btn btn-sm btn-danger rounded-0">Delete</a>

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

@push('script')

    <script>

        window.addEventListener('close-modal', event =>{

            $('#modalDeleteEmployee').modal('hide');

        });

    </script>
    
@endpush
