@extends("layouts.main")

@section('title','Contact Us')

@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">CONTACT US</h1>
                <p class="breadcrumb-custom">
                    <a href="index.html" class="text-blue">Home</a>
                    <span class="mx-2">&gt;</span>
                    <span>Contact Us</span>
                </p>

            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-5">
                <form action="#" class="p-5 bg-white" id="form-message">
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">

                            <label class="text-black" for="fname">First Name</label>
                            <input type="text" name="first_name" id="fname" class="form-control">
                            <small class="el-error text-danger d-none" data-error="first_name"></small>
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Last Name</label>
                            <input type="text" name="last_name" id="lname" class="form-control">
                            <small class="el-error text-danger d-none" data-error="last_name"></small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <small class="el-error text-danger d-none" data-error="email"></small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="subject">Subject</label>
                            <input type="subject" name="subject" id="subject" class="form-control">
                            <small class="el-error text-danger d-none" data-error="subject"></small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                            <small class="el-error text-danger d-none" data-error="message"></small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button onclick="submitForm(this)" type="button" class="btn btn-primary py-2 px-4 text-white">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p>{!! $contact->address !!}</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p>{!! $contact->phone !!}</p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p>
                        {!! $contact->email !!}
                    </p>
                </div>
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    {!! $visi !!}
                    <p class="mt-3">
                        <a href="/" class="btn btn-primary px-4 py-2 text-white">Jaya Putra Teknik</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    function isNull(obj) {
        for (let key in obj) {
            if (obj[key] == '') {
                return true
            }
        }

        return false;
    }
    async function submitForm(e) {


        const form = document.getElementById('form-message');

        const fdObject = Object.fromEntries(new FormData(form)) // change value form data to object

        if (isNull(fdObject)) {
            return alert('Please complete all the input first')
        }
        e.disabled = true;
        e.textContent = 'Loading ...';

        const result = await process_messages(fdObject);

        let {
            status,
            message
        } = result;
        document.querySelectorAll('small.el-error').forEach(e => e.classList.add('d-none'));
        if (status == 'error') {
            alert('Oops...something wrong with your input, Please check again');
            for (let key in message) {
                const showError = document.querySelector(`small[data-error="${key}"]`);
                showError.classList.remove('d-none');
                showError.textContent = message[key][0];
            }
        } else {
            form.reset();
            alert(message)
        }
        e.disabled = false;
        e.textContent = 'SEND MESSAGE';

    }

    async function process_messages(data) {

        try {
            const hit = await fetch(`{{route('process_messages')}}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
            const response = await hit.json();
            return response;
        } catch (error) {
            return error;
        }
    }
</script>

@endsection