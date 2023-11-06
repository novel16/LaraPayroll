<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="modalAddOvertime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Overtime</h5>
          <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent = "storeOvertime">
            <div class="modal-body">
            
                <div class="form-group">
                  <label>Employee</label>
                  <select wire:model ="employee_id" class="form-select" id="">
                    <option value="">--Select--</option>
                    @foreach ($employees as $employee)
                      <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                    @endforeach
                  </select>
                  @error('employee_id')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" wire:model.defer ="date_of_overtime" class="form-control">
                  @error('date_of_overtime')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label>No. of Hours</label>
                  <input type="number" wire:model = "hours" class="form-control">
                  @error('hours')
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
              <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary  btn-sm rounded-0">Save</button>
            </div>
        </form>
      
      </div>
    </div>
  </div>




  <!-- update Modal -->
<div wire:ignore.self class="modal fade" id="modalUpdateOvertime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Overtime</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading>
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>Loading...
      </div>
      <div wire:loading.remove>

        <form wire:submit.prevent = "updateOvertime">
          <div class="modal-body">
          
              <div class="form-group" >
                <label>Employee</label>
                <select wire:model ="employee_id" class="form-select" id="">
                  <option value="">--Select--</option>
                  @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                  @endforeach
                </select>
                @error('employee_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="date" wire:model.defer ="date_of_overtime" class="form-control">
                @error('date_of_overtime')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>No. of Hours</label>
                <input type="number" wire:model = "hours" class="form-control">
                @error('hours')
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
            <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary  btn-sm rounded-0">Update</button>
          </div>
        </form>

      </div>
      
    
    </div>
  </div>
</div>



<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="modalDeleteOvertime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Overtime</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent = "destroyOvertime">
          <div class="modal-body">
          
              <div class="form-group">
                <h6>Are you sure? you want to delete this overtime ?</h6>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger  btn-sm rounded-0">Yes. Delete</button>
          </div>
      </form>
    
    </div>
  </div>
</div>