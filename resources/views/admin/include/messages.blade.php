@if(session()->has('success'))
    <div class="alert text-white bg-success" role="alert">
        <div class="iq-alert-text">{{session()->get('success')}}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
@elseif(session()->has('error'))
    <div class="alert text-white bg-danger" role="alert">
        <div class="iq-alert-text">{{session()->get('error')}}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
@endif
