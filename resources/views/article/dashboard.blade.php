<x-main>

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
                    <a href="{{route('categorie.index')}}" class="btn btn-outline-dark me-md-4">Visualizza le categorie</a>
                    <a href="{{route('article.create')}}" class="btn btn-outline-success me-md-4"><i class="bi bi-file-earmark-plus"></i> Crea nuovo articolo</a>
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
                    @foreach ($articles as $article)                        

                    <tr>
                        <th scope="row">#{{$article->id}}</th>
                        <td>
                            <img class="card-img-top" style="width:3rem"
                                src="{{Storage::url($article->image)}}"
                                alt="..." />
                        </td>
                        <td>{{$article->title}}</td>
                        <td>

                            <div
                                class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="{{route('article.show', ['article' => $article->id])}}" class="btn text-black me-md-3"><i class="bi bi-file-earmark h4"></i></a>
                                <a href="{{ route('article.edit', ['article' => $article->id]) }}" class="btn text-black me-md-3"><i class="bi bi-pencil-square h4"></i></a>

                                <form action="{{ route('article.destroy', ['article' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger me-md-3"><i class="bi bi-trash-fill h4"></i></button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </main>

</x-main>