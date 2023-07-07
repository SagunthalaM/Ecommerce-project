@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="wrapper">
      <h1 class="text-center text-primary"> Welcome   {{ auth()->user()->username }}</h1>

      
    </div>
</div>

@endsection