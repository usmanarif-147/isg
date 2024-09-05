<div>
    <h5 class="fw-500">{{trans('student.tab_change_password.change_password')}}</h5>
    @if ($message)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{trans('student.tab_change_password.message')}}!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <hr class="mb-0">
    <div class="row">

        <form wire:submit.prevent="updatePassword">
            <div class="col-lg-8 col-12">
                <div class="row align-items-center my-lg-2 my-0 gy-3">
                    <div class="col-lg-4 col-12">
                        <p class="m-0 fw-500 pt-lg-0 pt-3">
                            {{trans('student.tab_change_password.current_password')}}:
                        </p>
                    </div>
                    <div class="col-lg-8 col-12">
                        <input type="password" class="form-control bg-transparent" wire:model.live="current_password">
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row align-items-center my-lg-2 my-0 gy-3">
                    <div class="col-lg-4 col-12">
                        <p class="m-0 fw-500 pt-lg-0 pt-3">
                            {{trans('student.tab_change_password.new_password')}}:
                        </p>
                    </div>
                    <div class="col-lg-8 col-12">
                        <input type="password" class="form-control bg-transparent" wire:model.live="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row align-items-center my-lg-2 my-0 gy-3">
                    <div class="col-lg-4 col-12">
                        <p class="m-0 fw-500 pt-lg-0 pt-3">
                            {{trans('student.tab_change_password.confirm_new_password')}}:
                        </p>
                    </div>
                    <div class="col-lg-8 col-12">
                        <input type="password" class="form-control bg-transparent"
                            wire:model.live="password_confirmation">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex gap-4">
                        <div>
                            <button class="btn text-primary" type="submit">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
