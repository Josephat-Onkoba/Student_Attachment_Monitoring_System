@if (session()->has('success'))
<div class="alert alert-success in auto-dismiss-alert" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger in auto-dismiss-alert" role="alert">
    {{ session('error') }}
</div>
@endif

@if (session()->has('payment-error'))
<div class="alert alert-danger in auto-dismiss-alert" role="alert">
    {{ session('payment-error') }}
</div>
@endif

@if (session()->has('warning'))
<div class="alert alert-warning in auto-dismiss-alert" role="alert">
    {{ session('warning') }}
</div>
@endif

@if (session()->has('info'))
<div class="alert alert-info in auto-dismiss-alert" role="alert">
    {{ session('info') }}
</div>
@endif

@if (session()->has('secondary'))
<div class="alert alert-secondary in auto-dismiss-alert" role="alert">
    {{ session('secondary') }}
</div>
@endif

@if (session()->has('primary'))
<div class="alert alert-primary in auto-dismiss-alert" role="alert">
    {{ session('primary') }}
</div>
@endif

@if (session()->has('light'))
<div class="alert alert-light in auto-dismiss-alert" role="alert">
    {{ session('light') }}
</div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // Hide alert messages with the class 'auto-dismiss-alert' after 5 seconds
    $('.auto-dismiss-alert').delay(5000).fadeOut();
});
</script>
