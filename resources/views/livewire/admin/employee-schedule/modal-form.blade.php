 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="modalEditEmployeeSched" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" wire:model="firstname" id="exampleModalLabel">{{ $firstname }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent ="updateEmployeeSched">
            <div class="modal-body">
            
                <div class="form-group">
                    <span>Schedule</span>
                    <select wire:model.defer="schedule_id" class="form-select">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}">
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_in)->format('h:i A') }} - 
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_out)->format('h:i A') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm rounded-0">Update</button>
            </div>
        </form>
    </div>
    </div>
</div>
