<div>
    
    @include('livewire.admin.deduction.modal-form')

    @if (Session::has('message'))
    <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{Session::get('message')}} </p>
     @endif
     

    <div class="card">
        <div class="card-header">
            <h4>
                Deductions
                <a href="#"  data-bs-toggle="modal" data-bs-target="#modalAddDeduction" class="btn btn-sm btn-primary text-light rounded-0 float-end"><i class="fa-solid fa-plus"></i>New</a>
            </h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deductions as $deduction )
                        <tr>
                            <td hidden>{{ $deduction->id }}</td>
                            <td>{{ $deduction->description }}</td>
                            <td>{{ $deduction->amount }}</td>
                            <td>
                                <a href="#" wire:click = "editDeduction({{ $deduction->id }})" data-bs-toggle="modal" data-bs-target="#modalEditDeduction" class="btn btn-sm btn-success rounded-0">Edit</a>
                                <a href="#" wire:click = "deleteDeduction({{ $deduction->id }})" data-bs-toggle="modal" data-bs-target="#modalDeleteDeduction" class="btn btn-sm btn-danger rounded-0">Delete</a>

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

            $('#modalAddDeduction').modal('hide');
            $('#modalEditDeduction').modal('hide');
            $('#modalDeleteDeduction').modal('hide');

        });
    </script>
    
@endpush
