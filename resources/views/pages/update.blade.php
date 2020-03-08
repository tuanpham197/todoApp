@extends('layouts.master')

@section('content')
    
    @include('layouts.menu')
    <div class="main">
        @include('layouts.listtask')
        @include('pages.form-update')
    </div>
    
   
@endsection