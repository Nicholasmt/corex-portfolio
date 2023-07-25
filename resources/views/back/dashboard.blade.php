@extends('layouts.app')
@section('contents')

@include('layouts.nav')

@livewireStyles

<livewire:dashboard/>

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


