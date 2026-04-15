<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center align-items-center g-4">

            <div class="col-12 col-md-5 text-center bg-white rounded-4 p-4 shadow">
                <h2 class="mb-2">{{ $article->nome }}</h2>
                <ul>
                    @forelse ($article->categories as $category )
                        <li>{{ $category->name }}</li>
                    @empty
                        
                    @endforelse
                </ul>
                <p class="mb-3">{{ $article->ingredienti }}</p>
                <p class="fs-4"><strong>€ {{ $article->prezzo }}</strong></p>

                @auth
                    @if ($article->user_id == Auth::id())
                        <a href="{{ route('article.edit', $article) }}" class="btn btn-warning me-2">Modifica</a>
                        <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Sei sicuro di voler eliminare questo piatto?')">
                                Elimina
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <div class="col-12 col-md-5 text-center">
                <img src="{{ Storage::url($article->img) }}"
                    alt="Poster di '{{ $article->nome }}'"
                    class="img-fluid rounded-4 shadow"
                    style="max-height: 400px; object-fit: cover; width: 100%;">
            </div>

        </div>
    </div>
</x-layout>