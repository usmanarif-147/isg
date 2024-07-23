<div class="p-lg-5 p-4">
    <h4 class="fw-600">Settings</h4>
    <nav>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" wire:click="showPasswordTab">
                <button class="nav-link settings-nav {{ $tab == 1 ? 'active' : '' }} ps-0" type="button">
                    Password
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link settings-nav {{ $tab == 2 ? 'active' : '' }}" type="button"
                    wire:click="showPrivacyTab">
                    Privacy
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link settings-nav {{ $tab == 3 ? 'active' : '' }}" type="button"
                    wire:click="showLanguageTab">
                    Language
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link settings-nav px-lg-3 px-0 {{ $tab == 4 ? 'active' : '' }}" type="button"
                    wire:click="showTermsTab">
                    Terms and Conditions
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade {{ $tab == 1 ? 'active show' : '' }}">
                <livewire:student.setting.tab.change-password />
            </div>
            <div class="tab-pane fade {{ $tab == 2 ? 'active show' : '' }}">
                <livewire:student.setting.tab.privacy />
            </div>
            <div class="tab-pane fade {{ $tab == 3 ? 'active show' : '' }}">
                <livewire:student.setting.tab.language />
            </div>
            <div class="tab-pane fade {{ $tab == 4 ? 'active show' : '' }}">
                <livewire:student.setting.tab.terms />
            </div>
        </div>
    </nav>
</div>
