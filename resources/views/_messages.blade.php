@if (session()->has('success'))
<div class="alert alert-success in" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger in" role="alert">
    {{ session('error') }}
</div>
@endif

@if (session()->has('payment-error'))
<div class="alert alert-error in" role="alert">
    {{ session('payment-error') }}
</div>
@endif

@if (session()->has('warning'))
<div class="alert alert-warning in" role="alert">
    {{ session('warning') }}
</div>
@endif

@if (session()->has('info'))
<div class="alert alert-info in" role="alert">
    {{ session('info') }}
</div>
@endif

@if (session()->has('secondary'))
<div class="alert alert-secondary in" role="alert">
    {{ session('secondary') }}
</div>
@endif

@if (session()->has('primary'))
<div class="alert alert-primary in" role="alert">
    {{ session('primary') }}
</div>
@endif

@if (session()->has('light'))
<div class="alert alert-light in" role="alert">
    {{ session('light') }}
</div>
@endif
