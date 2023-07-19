<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button wire:click="dashboard" class="nav-link mt-2 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class=" bi bi-house-door"> </i> Dashboard</button>
          <button wire:click="services" class="nav-link mt-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class=" bi bi-bookmark-check"> </i> Services</button>
          <button wire:click="portfolio" class="nav-link mt-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-card-image"></i> Portfolios</button>
          <button wire:click="settings" class="nav-link mt-2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"> <i class="bi bi-gear-wide"></i> Settings</button>
          <a href="{{ route('logout')}}" class="nav-link mt-2 ml-3"> <i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>
</div>
