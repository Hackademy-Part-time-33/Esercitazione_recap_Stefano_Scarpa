<div class="px-4 px-md-5 mb-5">
    <div class="row gx-5 justify-content-center ">
        <div class="col-lg-8 col-xl-6 border p-5 rounded">

            <form wire:submit="store">
                <div class="form-floating mb-3">
                    <input class="form-control" id="title" value wire:model.live="name" type="text">
                    <label for="title">Nome</label>
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>
