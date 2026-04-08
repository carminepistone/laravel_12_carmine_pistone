<x-layout>
    <div class="container-fluid py-5">
  
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h2 class="display-5 form-label">{{ $category->name }}</h2>
            </div>
        </div>

        <div class="row justify-content-center g-4"> 
            @forelse ($category->menus as $menu)
                
                <div class="col-12 col-sm-6 col-lg-6 d-flex justify-content-center">
                    <x-card :menu="$menu" class="w-100" />
                </div>
            @empty
                <div class="col-12 col-md-8 text-center py-5">
                    <h4 class="text-muted">Nessun piatto collegato a questa categoria</h4>
                    <a href="{{ route('menu.create') }}" class="btn custombtn mt-3 shadow-sm">Crealo tu!</a>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>
