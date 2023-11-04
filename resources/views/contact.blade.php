@extends('layout.master')
@section('content')
<img src="{{ asset('storage/homepage/anhbia.jpeg') }}" alt="" class="img-fluid w-100">
<div class="container1">
    <div class="row">
        <div class="header">
            <h3>Contact</h3>
            <p>Thank you for your interest in Nanomart. We want to hear from you, if you have questions, comments or
                answers. Please contact us using the following information.</p>
        </div>
    </div>
</div>

<div class ="container">
    <div class="row">
        <div class="col-md-7">
            <form class="main">
                <h2>Git in touch</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Your Name</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter Your Name">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        <div class="col-md-5">
            <h4>Contact Us</h4>
            <div class="mt-5">
                <div class="d-flex">
                    <i class="bi bi-geo-alt-fill"></i>
                    <p>Address :19 Lê Thanh Nghị , Bạch Mai , Hai Bà Trưng , Hà Nội </p>
                </div>
                <div class="d-flex">
                    <i class="bi bi-telephone-fill"></i>
                    <p>Hotline : 0964625320 </p>
                </div>
                <div class="d-flex">
                    <i class="bi bi-envelope"></i>
                    <a href="mailto:longthanh937@gmail.com">longthanh937@gmail.com</a>

                </div>
                <div class="d-flex">
                    <i class="bi bi-browser-chrome"></i>
                    <p> Website: https:/Ceramic-Tiles.vn</p>
                </div>

            </div>
        </div>
    </div>



</div>

<div class="col-12 mb-6">
    <form class="google">
        <h5>Our Location</h5>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.940115968208!2d105.8494022744659!3d21.035081980615843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abbf5c6e7ce3%3A0xcfa017611623993c!2zMTkwMCBMZSBUaMOpw6J0cmU!5e0!3m2!1svi!2s!4v1695882844641!5m2!1svi!2s"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </form>
</div>
@endsection