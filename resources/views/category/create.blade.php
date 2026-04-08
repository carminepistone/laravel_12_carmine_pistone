<x-layout>

<div class="container-fluid">
    <div class="row justify-content-center text-center mt-5">
        <div class="col-12 col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action={{ route('category.submit') }}>
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label display-5">Inserisci la categoria</label>
                    <input type="text" name="name" class="form-control" id="category" vale="{{old('name')}}">
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>

</x-layout>