@extends('layout.sidenav-layout')
@section('content')
    @include('components.categorie.categorie-list')
    @include('components.categorie.categorie-delete')
    @include('components.categorie.categorie-create')
    @include('components.categorie.categorie-update')
@endsection