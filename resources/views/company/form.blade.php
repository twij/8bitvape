@extends('company.layout')

@section('form')

    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="e.g. Capella" aria-describedby="name-label">
    <small id="name-label" class="form-text text-muted">The name of the company</small>

@endsection
