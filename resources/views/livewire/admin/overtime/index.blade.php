<div>
    @include('livewire.admin.overtime.modal-form')

    <div>
        <div class="row">
            <div class="col-md-12">

                
                @if (Session::has('message'))

                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Overtime
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddOvertime" class="btn btn-sm btn-primary text-light rounded-0 float-end">New</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Employee ID</th>
                                  <th>Name</th>
                                  <th>No. of Hours</th>
                                  <th>Rate</th> 
                                  <th>Tools</th> 
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($overtime as $overtimeItem)

                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($overtimeItem->date_of_overtime)->format('M d, Y') }}</td>
                                        <td>{{ $overtimeItem->overtimeEmployee->employee_id }}</td>
                                        <td>{{ $overtimeItem->overtimeEmployee->firstname }} {{ $overtimeItem->overtimeEmployee->lastname }}</td>
                                        <td>{{ $overtimeItem->hours }}</td>
                                        <td>{{ $overtimeItem->rate }}</td>
                                        <td>
                                            <a href="#" wire:click="editOvertime({{ $overtimeItem->id }})"  data-bs-toggle="modal" data-bs-target="#modalUpdateOvertime" class="btn btn-sm rounded-0 btn-success">Edit</a>
                                            <a href="#" wire:click="deleteOvertime({{ $overtimeItem->id }})"  data-bs-toggle="modal" data-bs-target="#modalDeleteOvertime" class="btn btn-sm rounded-0 btn-danger">Delete</a>
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


@push('script')

    <script>
        window.addEventListener('close-modal', event => {

            $('#modalAddOvertime').modal('hide');
            $('#modalUpdateOvertime').modal('hide');
            $('#modalDeleteOvertime').modal('hide');

        });

    </script>
    
@endpush
