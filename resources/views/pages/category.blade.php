@extends('layouts.master')

@section('content')
    
    @include('layouts.menu')
    <div class="main">
        @include('pages.list-cate')
        @include('pages.detail')
    </div>
   
@endsection