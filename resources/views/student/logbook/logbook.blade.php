@extends('layouts.app')

@section('content')

<div class="content-wrapper">

<div class="card">
  <div class="card-header">
    Logbook
  </div>
  <div class="card-body">
    <h5 class="card-title">Download Your Logbook</h5>
    <p class="card-text">Get your Logbook here. <br> The attached document is in pdf but can be converted into word document.</p>
    <form action="{{ asset('storage/documents/Logbook.pdf') }}" method="get">
        <button type="submit" class="btn btn-primary">Download Document</button>
    </form>
  </div>
</div>

</div>

@endsection