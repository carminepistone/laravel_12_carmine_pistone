<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center text-center mt-5">
            <h2 class="text-white form-label">Inserire Piatto</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                    </div>
                    <div class="mb-3 dashboard container-fluid">
                        <label class="form-label">Categoria:</label>
                        @foreach ($categories as $category)
                            <div>
                                <input 
                                    type="checkbox"
                                    id="{{ 'categoryCheck' . $category->id }}"
                                    name="categories[]"
                                    value="{{ $category->id }}"
                                    {{ collect(old('categories'))->contains($category->id) ? 'checked' : '' }}
                                >
                                <label for="{{ 'categoryCheck' . $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        <p>Non vedi la categoria corretta? <a href="{{ route('category.create') }}">Inseriscila qui</a></p>
                    </div>
                    <div class="mb-3">
                        <label for="ingredienti" class="form-label">Ingredienti:</label>
                        <textarea name="ingredienti" id="ingredienti" cols="30" rows="6" class="form-control">{{ old('ingredienti') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prezzo" class="form-label">Prezzo:</label>
                        <input type="number" class="form-control" id="prezzo" name="prezzo" step="0.01" min="0" value="{{ old('prezzo') }}">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Inserire un'immagine:</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <button type="submit" class="btn custombtn">Invia</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>