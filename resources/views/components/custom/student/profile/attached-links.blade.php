<div>
    <div class="py-4" wire:ignore.self>

        <div wire:ignore.self class="modal fade" id="addLinkModal" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <x-custom.student.profile.link-modal :icon="$icon" :title="$title" />
        </div>


        <div class="row my-3">
            @foreach ($platforms as $platform)
                <div class="col-12 col-lg-4">
                    <div class="card-shadow p-3 my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <div
                                        class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center attached-social-links">
                                            <img src="{{ asset(Storage::url($platform->platform_icon)) }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="m-0 fw-600 fs-13">
                                            {{ $platform->platform_title }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    @if ($platform->platfrom_user_status)
                                        <div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked" checked="">
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-warning"> Update </button>
                                        </div>
                                    @else
                                        <div>
                                            <button class="btn btn-sm btn-primary"
                                                wire:click="addPlatform('{{ $platform->platform_id }}', '{{ $platform->platform_title }}', '{{ $platform->platform_icon }}')">
                                                Add
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
