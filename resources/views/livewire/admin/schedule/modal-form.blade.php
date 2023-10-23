
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalAddSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
          <button type="button" wire:click ="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent = "storeSchedule">

            <div class="modal-body">
         
                <div class="form-group">
                    <label>Time In</label>
                    <input type="time" wire:model = "time_in" class="form-control">
                    @error('time_in')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Time Out</label>
                    <input type="time" wire:model = "time_out" class="form-control">
                    @error('time_out')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" wire:click ="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm rounded-0">Save</button>
            </div>

        </form>
        
      </div>
    </div>
  </div>



  
<!-- Update Modal -->
<div wire:ignore.self class="modal fade" id="modalEditSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
          <button type="button" wire:click ="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading>
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>Loading
        </div>
        <div wire:loading.remove >
            <form wire:submit.prevent = "updateSchedule">

                <div class="modal-body">
            
                    <div class="form-group">
                        <label>Time In</label>
                        <input type="time" wire:model = "time_in" class="form-control">
                        {{-- @error('time_in')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label>Time Out</label>
                        <input type="time" wire:model = "time_out" class="form-control">
                        {{-- @error('time_out')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}
                    </div>

                </div>
                <div class="modal-footer">
                <button type="button" wire:click ="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm rounded-0">Update</button>
                </div>

            </form>
        </div>
      </div>
    </div>
  </div>


{{-- delete modal --}}
  <div wire:ignore.self class="modal fade" id="modalDeleteSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
          <button type="button" wire:click ="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent = "destroySchedule">

            <div class="modal-body">
         
                <div class="form-group">
                    <h4 class=" text-danger">Are you sure? you want to delete this schedule ?</h4>
                </div>
                

            </div>
            <div class="modal-footer">
              <button type="button" wire:click ="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger btn-sm rounded-0">Yes. Delete</button>
            </div>

        </form>
        
      </div>
    </div>
  </div>