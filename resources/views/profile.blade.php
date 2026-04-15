<x-layout>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8 text-center dashboard">
                <h2 class="mb-4 mt-4">Profilo di {{ Auth::user()->name }}</h2>

                @forelse (Auth::user()->articles as $article)
                    <div class="row justify-content-center">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <h3 class="text-center mb-4">Nessun piatto caricato.</h3>
                    <a href="{{ route('article.create') }}" class="btn custombtn w-50 mb-5">
                        Pubblica il tuo primo Piatto
                    </a>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>