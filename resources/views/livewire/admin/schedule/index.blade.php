<div>
    
    @include('livewire.admin.schedule.modal-form')

    <div class="row">
        <div class="col-md-12">
            
            @if (Session::has('message'))
            <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{Session::get('message')}} </p>
            @endif
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>
                        Schedules
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddSchedule" class="btn btn-sm btn-primary rounded-0 text-light float-end">New</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td hidden>{{ $schedule->id }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_in)->format('h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_out)->format('h:i A') }}</td>
                                    <td>
                                        <a href="#" wire:click = "editSchedule({{ $schedule->id }})" data-bs-toggle="modal" data-bs-target="#modalEditSchedule" class="btn btn-sm btn-success rounded-0">Edit</a>
                                        <a href="#" wire:click = "deleteSchedule({{ $schedule->id }})" data-bs-toggle="modal" data-bs-target="#modalDeleteSchedule" class="btn btn-sm btn-danger rounded-0">Delete</a>
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

        window.addEventListener('close-modal', event => {

            $('#modalAddSchedule').modal('hide');
            $('#modalEditSchedule').modal('hide');
            $('#modalDeleteSchedule').modal('hide');
            

        });

    </script>
    
@endpush