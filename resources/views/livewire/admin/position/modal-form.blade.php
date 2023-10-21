<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalAddPosition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
          <button type="button" wire:click ="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent = "storePosition">

            <div class="modal-body">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" wire:model = "description" class="form-control">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rate</label>
                    <input type="number" wire:model = "rate" class="form-control">
                    @error('rate')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click ="closeModal" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>

        </form>
        
      </div>
    </div>
  </div>

  <!-- Update Modal -->
<div wire:ignore.self class="modal fade" id="modalEditPosition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
          <button type="button" wire:click ="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading>
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>Loading...
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent = "updatePosition">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" wire:model = "description" class="form-control">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Rate</label>
                        <input type="number" wire:model = "rate" class="form-control">
                        @error('rate')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" wire:click ="closeModal" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>

            </form>
        </div>
        
      </div>
    </div>
  </div>


  {{-- Delete Modal --}}
  <div wire:ignore.self class="modal fade" id="modalDeletePosition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Position</h5>
          <button type="button" wire:click ="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent = "destroyPosition">

            <div class="modal-body">
                <div class="form-group">
                    <h5>Are you sure, you want to delete this position ?</h5>
                    
                </div>
               
            </div>
            <div class="modal-footer">
              <button type="button" wire:click ="closeModal" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-sm text-light btn-danger">Yes. Delete</button>
            </div>

        </form>
        
      </div>
    </div>
  </div>