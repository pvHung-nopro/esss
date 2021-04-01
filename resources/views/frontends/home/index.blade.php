@extends('layouts.frontend')

@section('content')
     @include('frontends.partitions.slider',['slider'=>$slider ?? collect()])
     @include('frontends.partitions.section',['products'=> $products ?? collect()])
@endsection
