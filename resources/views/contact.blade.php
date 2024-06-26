<x-main>
    <section class="py-5">
        <div class="container px-5">

            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">

                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('send') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ old('name') }}" placeholder="Enter your name...">
                                <label for="name">Full name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email"
                                    value="{{ old('email') }}" placeholder="name@example.com">
                                <label for="email">Email address</label>

                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..."
                                    style="height: 10rem">{{ old('message') }}</textarea>
                                <label for="message">Message</label>

                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg " type="submit">Invia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-main>