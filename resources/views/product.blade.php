@extends('tpl.main')
@section('main')



    <x-general.breadcrumbs/>

    <x-product.card :product="$product"/>

    @dump($product->toArray(), $json, App\Data\VivinoJson\VivinoData::from($json)->toArray())


@endsection


