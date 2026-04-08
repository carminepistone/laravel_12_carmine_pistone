<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center text-center mt-5">
            <h2 class="text-white form-label">Modifica Piatto</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 col-md-8">
                <form method="POST" action="{{ route('menu.update', $menu) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $menu->nome }}">
                    </div>


                    <div class="mb-3 dashboard container-fluid">
                        <label class="form-label">Categoria:</label>
                        @foreach ($categories as $category)
                            <div>
                                <input 
                                    type="radio" 
                                    id="{{ 'categoryRadio' . $category->id }}" 
                                    name="categories" 
                                    value="{{ $category->id }}"
                                    {{ $menu->categories->contains($category->id) ? 'checked' : '' }}
                                >
                                <label for="{{ 'categoryRadio' . $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        <p>Non vedi la categoria corretta? <a href="{{ route('category.create') }}">Inseriscila qui</a></p>
                    </div>

                    <div class="mb-3">
                        <label for="ingredienti" class="form-label">Ingredienti:</label>
                        <textarea name="ingredienti" id="ingredienti" cols="30" rows="6" class="form-control">{{ $menu->ingredienti }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="prezzo" class="form-label">Prezzo:</label>
                        <input type="number" class="form-control" id="prezzo" name="prezzo" step="0.01" min="0" value="{{ $menu->prezzo }}">
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Inserire un'immagine:</label>
                        <input type="file" class="form-control" id="img" name="img">

                        @if ($menu->img)
                            <small class="text-white">Immagine attuale:</small><br>
                            <img src="{{ asset('storage/' . $menu->img) }}" alt="immagine piatto" width="150" class="mt-2">
                        @endif
                    </div>

                    <button type="submit" class="btn custombtn">Salva le modifiche</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>