<section id="contact" class="mt-5">
    <div class="row"></div>
    <div class="content align-content-center row h-100 container-sm">
        <div class="col-md text-end d-flex align-items-center">
            <div class="card">
                <div class="card-body text-center shadow">
                    {{-- masih mentah --}}
                    <form action="mailto:Alihanafi2907@gmail.com">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Full name" aria-label="Full name"
                                    name="Contact-Name" id="fullname">
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Email Address"
                                    aria-label="Email Address" name="Contact-Email" id="email">
                            </div>
                        </div>
                        <textarea class="form-control mb-3" id="message" name="message" placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-color">Send Message Now</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="content-inner">
                <h1 class="title">Kontak Kami</h1>
                <p class="vision">
                    {{ $aboutus->vision }}
                </p>
                <p class="mission">
                    {{ $aboutus->mission }}
                </p>
                <ul class="social">
                    <li><a class="icon" href="{{ $contact->facebook }}"><i
                                class="fa-brands fa-facebook-f"></i></a> </li>
                    <li><a class="icon" href="{{ $contact->twitter }}"><i
                                class="fa-brands fa-twitter"></i></a> </li>
                    <li><a class="icon" href="{{ $contact->instagram }}"><i
                                class="fa-brands fa-instagram"></i></a> </li>
                    <li><a class="icon" href="{{ $contact->email }}"><i
                                class="fa-solid fa-envelope"></i></a> </li>
                    <li><a class="icon" href="{{ $contact->phone }}"><i
                                class="fa-brands fa-whatsapp"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</section>
