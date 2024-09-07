@if(!empty($setting))
    {{-- <x-curator-glider
        class=""
        :media="$setting->favicon"
        alt="favicon"
        width="180" 
        height="180"
    /> --}}
    <img src="{{ asset('assets/imgs/logo.png') }}" width="180" height="180" alt="favicon" class="">
@else
    <img src="{{ asset('assets/imgs/sample-favicon.png') }}" width="180" height="180" alt="favicon" class="">
@endif