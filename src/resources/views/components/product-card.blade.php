<div class="product-card">
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-card__image">
    <div class="product-card__details">
        <h3 class="product-card__title">{{ $product->name }}</h3>
        <p class="product-card__price">価格: {{ $product->price }}円</p>
        <p class="product-card__description">{{ $product->description }}</p>
        <a href="{{ route('products.show', $product->id) }}" class="product-card__link">詳細を見る</a>
    </div>
</div>
