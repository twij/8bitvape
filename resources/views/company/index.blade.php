@extends('layouts.app')

@section('content')

@foreach($companies as $company)
    {{ $company->name }}<br>
@endforeach

@endsection
