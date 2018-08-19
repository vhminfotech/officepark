<script src="{!! asset('js/main.min.js') !!}"></script>
<!--<script src="{!! asset('js/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>-->
<script src="{!! asset('js/plugins/validate/jquery.validate.min.js') !!}" type="text/javascript"></script>
<!--<script src="{!! asset('js/plugins/validate/datepicker.min.js') !!}" type="text/javascript"></script>-->
<script src="{!! asset('js/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/comman_function.js') !!}" type="text/javascript"></script>

<!--<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>-->

@if (!empty($js)) 
@foreach ($js as $value) 
<script src="{{ asset('js/front/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif
<script>
    jQuery(document).ready(function() {

        @if (!empty($funinit))
                @foreach ($funinit as $value)
                    {{  $value }}
                @endforeach
        @endif
    });
</script>
@section('scripts')
@show