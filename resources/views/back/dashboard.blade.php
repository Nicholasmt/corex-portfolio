@section('head') 
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@extends('layouts.app')
@section('contents')

@include('layouts.nav')

@livewireStyles

<livewire:dashboard/>
{{-- <livewire:dashboard/> --}}

@endsection

@section('script')

@livewireScripts
@stack('scripts')
{{-- <script>
       $(document).ready(function(){
        window.livewire.on('alert_remove',()=>{
          setTimeout(function(){ $(".alert-success").fadeOut('fast');
          }, 3000);
        });
    });
</script> --}}
@endsection


