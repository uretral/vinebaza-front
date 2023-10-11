@extends('tpl.main')
@section('main')
    <x-general.breadcrumbs/>

    <livewire:widgets.availability-in-stores/>

    <livewire:catalog/>

@endsection
