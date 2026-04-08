<x-layout>


        <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-12 text-center mb-4 mt-4">
                <h2 class="display-3 text-white form-label">Tutte le categorie</h2>
            </div>


                @foreach ($categories as $category)
                    
                    <div class="col-12 col-md-3 d-flex justify-content-center">
                         <a href="{{ route('category.show', compact('category')) }}" class="h-100 w-100">
                            <div class="box mx-auto d-flex custombtn justify-content-center jalign-items-center">
                                <h3 class="text-capitalize">{{ $category->name }}</h3>
                            </div>
                         </a>
                    </div>


                @endforeach

        </div>
    </div>


</x-layout>