<div>
    
    @include('livewire.admin.position.modal-form')

    @if (Session::has('message'))
        <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{Session::get('message')}} </p>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>
                Positions
                <a href="#"  data-bs-toggle="modal" data-bs-target="#modalAddPosition" class="btn btn-sm btn-primary text-light rounded-0 float-end"><i class="fa-solid fa-plus"></i>New</a>
            </h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td hidden>{{ $position->id }}</td>
                            <td>{{ $position->description }}</td>
                            <td>{{ $position->rate }}</td>
                            <td>
                                <a href="#" wire:click = "editPosition({{ $position->id }})" data-bs-toggle="modal" data-bs-target="#modalEditPosition" class="btn btn-sm btn-success rounded-0">Edit</a>
                                <a href="#" wire:click = "deletePosition({{ $position->id }})" data-bs-toggle="modal" data-bs-target="#modalDeletePosition" class="btn btn-sm btn-danger rounded-0">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>


@push('script')

   <script>

        window.addEventListener('close-modal',event =>{

            $('#modalAddPosition').modal('hide');
            $('#modalEditPosition').modal('hide');
            $('#modalDeletePosition').modal('hide');

            

        });

   </script>
    
@endpush
