
<div class="col-4 col-md-4 mb-4">
    <div class="card h-60 cardcustom">

        @if (!$article->img)
            <img src="https://picsum.photos/200/300" class="card-img-top" alt="{{ $article->nome }}">
        @else
            <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="{{ $article->nome }}">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $article->nome }}</h5>
            <p class="card-text">{{ $article->ingredienti }}</p>
            <p class="card-text">Creato dall'utente {{ $article->user->name}}</p>
                <div class="d-flex">
                    @forelse ($article->categories as $category )
                            @if (!$loop->last)
                            <a href="{{ route('category.show', compact('category')) }}">{{ $category->name }},</a>
                            @else
                            <a href="{{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
                            @endif
                    @empty
                    @endforelse

                </div>
        
            <h6 class="fw-bold">€ {{ number_format($article->prezzo, 2) }}</h6>
            <a href="{{ route('article.show', $article) }}" class="btn custombtn">Leggi di più</a>
            @auth
                @if ($article->user_id == Auth::id())
                    <a href="{{ route('article.edit', $article) }}" class="btn custombtn">Modifica</a>
                 @endif
            @endauth
        </div>
    </div>
</div>