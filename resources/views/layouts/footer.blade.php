<div class="credits text-capitalize">
    @if(!empty($setting))
      {{ $setting->full_name }}
    @else
      MY Name here  
    @endif 
    <a href="{{ route('index') }}"> © Copyright {{date('Y')}}</a>
</div>

@if(!empty($setting))
<style>
    .credits a{
       color: <?php echo $setting->primary_color ?> !important;
    } 
</style>
@endif
 
 
 