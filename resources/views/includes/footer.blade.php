<footer id="footer" class="bg-light">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">

                @foreach ($soc_med as $s)
                <div class="m-3">
                    <a class="text-dark font-l" target="blank" href="{{ $s->url }}"> <i class="{{ $s->logo }}"></i> </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <p class="text-center mt-3">© 2022 Copyright: Nikola Ciganovic. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>