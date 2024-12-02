@extends('layouts/contentNavbarLayout')

@section('title', $azienda->nome)

@section('content')
    @livewire('azienda', ['id' => $id])
@endsection
