{{-- 
    <div class="bg-image">
        <div class="content-container">
            <div class="container-fluid">
                <div class="title-border p-3 ms-3">           
                    <i class="fa me-2" aria-hidden="true">
                        <img class="nav-icons ms-3" src="/assets/icons-briefcase-black.png" alt="">
                    </i>                
                    Post a Job             
                </div>       
            </div>
        </div> 
        <br>
        <div class="form-container rounded " >
            <div class="ms-3 p-4">
                <div class="mt-1">
                    <h5 style="font-weight: bold;"">Job Details</h5>
                </div>
                <div class="d-flex justify-content-between me-2" style="font-size: 11px">
                    <p>All information will be publicly displayed in student's job feed</p>
                    <p>(*) for mandatory</p>
                </div>
                <hr class="mt-0">

                <div class="row mb-3">
                    <label for="job_title" class="col-md-3 col-form-label text-md-end">{{ __('Job Title*') }}</label>
                    <div class="col-md-8">
                        <div>
                        <input id="job_title" type="text" class="form-control" wire:model="job_title" required aria-label="default input example">
                        @error('job_title') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                    </div>
                </div>


            </div>
        </div>
    
    </div>

 --}}