@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
    <div class="product-detail">
        <h1 class="product-detail__title">{{ $product->name }}</h1>
        <p class="product-detail__price">価格: {{ $product->price }}円</p>
        <p class="product-detail__description">{{ $product->description }}</p>
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-detail__image">

        <a href="{{ route('products.index') }}" class="button button--secondary">一覧に戻る</a>
    </div>
@endsection
