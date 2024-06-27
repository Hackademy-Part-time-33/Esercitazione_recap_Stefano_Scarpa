<main class="container">

    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="mt-5">
            <div
                class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Articoli inseriti</h3>
                <form class="d-flex" role="search" action="#"
                    method="POST">
                    <input class="form-control me-2" name="search"
                        type="search" placeholder="Cerca Articolo"
                        aria-label="Search">
                </form>
                <a href="{{route('dashboard')}}" class="btn btn-outline-dark me-md-4">Ritorna agli articoli</a>
                <a href="{{route('categories.create')}}" class="btn btn-outline-success me-md-4"><i class="bi bi-file-earmark-plus"></i> Crea nuova categoria</a>
            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Titolo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)                        

                <tr wire:key="{{ $category->id }}">
                    <th scope="row">#{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>

                        <div
                            class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <a href="{{route('categories.edit', ['category' => $category])}}" class="btn text-black me-md-3"><i class="bi bi-pencil-square h4"></i></a>

                            <a href="#" wire:click.prevent="destroy({{$category}})">
                                <i class="bi bi-trash-fill h4"></i>
                            </a>
                            
                        </div>
                    </td>
                </tr>
            </tbody>
                @endforeach
            </table>
        </div>
    </div>

</main>
