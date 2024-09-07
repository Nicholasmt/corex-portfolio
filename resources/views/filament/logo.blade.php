<div style="margin-top:-3.1%">
    @if(!empty($setting))
        <x-curator-glider
            class="h-16"
            :media="$setting->logo"
            alt="logo"
            width="60" 
            height="60"
        />
    @else
        <h2 class="h-16" style="font-weight: 900;">LOGO HERE</h2>
    @endif
</div>