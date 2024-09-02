<div class="credits text-capitalize">
    @if(!empty($setting))
      {{ $setting->full_name }}
    @else
      MY Name here
    @endif 
    <a href="#"> © Copyright {{date('Y')}}</a>
</div>