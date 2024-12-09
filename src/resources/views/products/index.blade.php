@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush

@section('title', '商品一覧')

@section('content')
<div class="product-page">
    <aside class="product-page__sidebar">
        <h2 class="product-page__sidebar-title">検索</h2>
        <div class="product-page__search-area">
            <input type="text" placeholder="商品名で検索" class="product-page__search-input">
            <button class="product-page__search-button">検索</button>
        </div>
        
        <h2 class="product-page__sidebar-title">フィルター</h2>
        <div class="product-page__filter-area">
            <select class="product-page__price-filter">
                <option value="">価格帯で表示</option>
                <option value="0-1000">¥1000以下</option>
                <option value="1001-2000">¥1001-¥2000</option>
            </select>
        </div>
    </aside>

    <main class="product-page__main-content">
        <h1 class="product-page__title">商品一覧</h1>
        
        <div class="product-page__controls">
            <button class="product-page__add-button">+ 商品を追加</button>
        </div>

        <div class="product-page__grid">
            @foreach ($products as $product)
            <div class="product-card">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-card__image">
                <div class="product-card__info">
                    <h3 class="product-card__name">{{ $product->name }}</h3>
                    <p class="product-card__price">¥{{ number_format($product->price) }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="product-page__pagination">
            {{ $products->links() }}
        </div>
    </main>
</div>
@endsection
@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-card">
                <h2 class="product-card__title">{{ $product->name }}</h2>
                <p class="product-card__price">価格: {{ $product->price }}円</p>
                <p class="product-card__description">{{ $product->description }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="product-card__link">詳細を見る</a>
                <a href="{{ route('products.edit', $product->id) }}" class="product-card__link product-card__link--edit">編集</a>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
