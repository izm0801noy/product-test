@if ($errors->any())
    <div class="form-errors">
        <h2 class="form-errors__title">入力エラーがあります。</h2>
        <ul class="form-errors__list">
            @foreach ($errors->all() as $error)
                <li class="form-errors__item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
