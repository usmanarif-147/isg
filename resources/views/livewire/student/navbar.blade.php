<div>
    <a href="javascript:void(0)" wire:click="notifications">
        <div class="position-relative">
            <img src="{{ asset('student/images/bell-icon.svg') }}" class="img-fluid" alt="">
            @if (auth()->user()->unreadNotifications->count())
                <div class="position-absolute bottom-0">
                    <img src="{{ asset('student/images/red-circle.svg') }}" class="img-fluid" alt="">
                </div>
            @endif
        </div>
    </a>
</div>
