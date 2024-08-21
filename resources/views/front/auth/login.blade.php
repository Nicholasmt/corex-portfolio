@extends('layouts.app')
@section('contents')

@include('layouts.nav')

<livewire:auth/>

@livewireScripts

@endsection