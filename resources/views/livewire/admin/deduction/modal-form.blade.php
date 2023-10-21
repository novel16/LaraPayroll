<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalAddDeduction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Deductions</h5>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent = "storeDeduction">
            <div class="modal-body">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" wire:model = "description" class="form-control">
                    @error('description')
                      <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" wire:model = "amount" class="form-control">
                    @error('amount')
                      <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm rounded-0" >Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>


{{-- Edit brand --}}

<div wire:ignore.self class="modal fade" id="modalEditDeduction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Deductions</h5>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading>
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>Loading...
      </div>
      <div wire:loading.remove>

          <form wire:submit.prevent = "updateDeduction">
            <div class="modal-body">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" wire:model.defer = "description" class="form-control">
                    @error('description')
                      <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" wire:model.defer = "amount" class="form-control">
                    @error('amount')
                      <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm rounded-0" >Update</button>
            </div>
        
          </form>
      </div>
    
     
    </div>
  </div>
</div>

{{-- Delete Modal --}}

<div wire:ignore.self class="modal fade" id="modalDeleteDeduction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Deductions</h5>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent = "destroyDeduction">
          <div class="modal-body">
             <div class="form-group">
              <h5 class="text-center text-danger">Are you sure? You want to delete this deduction ?</h5>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger text-light btn-sm rounded-0" >Yes. Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>
