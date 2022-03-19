@extends('layouts.admin')
@section('title','Profile')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>

            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{session('success')}}
        </div>
    </div>

    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card card-primary">
                    <div class="card-header justify-content-between  flex-nowrap align-items-center">
                        <h4>Visi</h4>

                        <a data-collapse="#visi" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>

                    </div>
                    <div class="collapse" id="visi">
                        <div class="card-body">
                            <form id="form-visi">
                                <textarea onclick="auto_grow(this)" oninput="auto_grow(this)" name="visi" class="form-control ">{!! $profile->visi !!}</textarea>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success" onclick="buttonSave(this)" data-form="#form-visi">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card card-primary">
                    <div class="card-header justify-content-between  flex-nowrap align-items-center">
                        <h4>Misi</h4>

                        <a data-collapse="#misi" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>

                    </div>
                    <div class="collapse" id="misi">
                        <div class="card-body">
                            <form id="form-misi">
                                <textarea onclick="auto_grow(this)" oninput="auto_grow(this)" name="misi" class="form-control ">{!! $profile->misi !!}</textarea>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success" onclick="buttonSave(this)" data-form="#form-misi">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-3">
                <div class="card card-primary">
                    <div class="card-header justify-content-between  flex-nowrap align-items-center">
                        <h4>Slogan</h4>

                        <a data-collapse="#slogan" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>

                    </div>
                    <div class="collapse" id="slogan">
                        <div class="card-body">
                            <form id="form-slogan">
                                <textarea onclick="auto_grow(this)" oninput="auto_grow(this)" name="slogan" class="form-control ">{!! $profile->slogan !!}</textarea>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success" onclick="buttonSave(this)" data-form="#form-slogan">
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

        const result = await process_profile(fdObject);
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

    async function process_profile(data) {

        try {
            const hit = await fetch(`{{route('process_profile')}}`, {
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