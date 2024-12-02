@extends('layouts/contentNavbarLayout')

@section('title', $user->name)

@section('content')
    @livewire('utente', ['id' => $id])
@endsection
