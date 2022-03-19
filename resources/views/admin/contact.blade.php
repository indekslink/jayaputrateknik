@extends('layouts.admin')
@section('title','Contact')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Contact</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>

            <div class="breadcrumb-item">Contact</div>
        </div>
    </div>


    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card card-primary">
                    <div class="card-header justify-content-between  flex-nowrap align-items-center">
                        <h4>Address</h4>

                        <a data-collapse="#address" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>

                    </div>
                    <div class="collapse" id="address">
                        <div class="card-body">
                            <form id="form-address">
                                <textarea onclick="auto_grow(this)" oninput="auto_grow(this)" name="address" class="form-control">{{ $contact->address }}</textarea>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success" onclick="buttonSave(this)" data-form="#form-address">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card card-primary">
                    <div class="card-header justify-content-between  flex-nowrap align-items-center">
                        <h4>Phone</h4>

                        <a data-collapse="#phone" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>

                    </div>
                    <div class="collapse" id="phone">
                        <div class="card-body">
                            <form id="form-phone">
                                <textarea onclick="auto_grow(this)" oninput="auto_grow(this)" name="phone" class="form-control ">{{ $contact->phone }}</textarea>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success" onclick="buttonSave(this)" data-form="#form-phone">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card card-primary">
                    <div class="card-header justify-content-between  flex-nowrap align-items-center">
                        <h4>Email</h4>

                        <a data-collapse="#email" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>

                    </div>
                    <div class="collapse" id="email">
                        <div class="card-body">
                            <form id="form-email">
                                <textarea onclick="auto_grow(this)" oninput="auto_grow(this)" name="email" class="form-control ">{{ $contact->email }}</textarea>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success" onclick="buttonSave(this)" data-form="#form-email">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('style')
<style>
    textarea {
        resize: none;
        overflow: hidden;
        min-height: 50px;

    }
</style>
@endsection

@section('script')

<script>
    function cb(result) {
        console.log(result);
    }

    async function buttonSave(e) {
        e.disabled = true;
        e.textContent = 'Loading...'
        const idForm = e.getAttribute('data-form');
        const form = new FormData(document.querySelector(idForm));;
        const fdObject = Object.fromEntries(form) // change value form data to object

        const result = await process_contact(fdObject);
        let {
            status,
            msg
        } = result;

        e.disabled = false;
        e.textContent = 'Save'


        if (status == 'error') {
            msg = msg[result.key[0]][0]
        }
        myAlert(status, msg)
    }


    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }

    async function process_contact(data) {

        try {
            const hit = await fetch(`{{route('process_contact')}}`, {
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