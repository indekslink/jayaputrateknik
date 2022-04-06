@extends('layouts.admin')
@section('title','Galleries')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Galleries</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>

            <div class="breadcrumb-item">Galleries</div>
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
        <div class="card">
            <div class="card-header">
                <button class="btn btn-success" onclick="addItem()" type="button"><i class="fas fa-plus"></i> Add</button>
            </div>
            <div class="card-body ">
                <div class="row" id="parent-gallery">

                    @forelse($galleries as $gallery)
                    <div class="col-md-4 col-lg-3 col-6">
                        <img src="/images/uploads/galleries/{{$gallery->image}}" alt="gallery" class="img-thumbnail img-fluid">
                    </div>
                    @empty

                    <div class="col-12 text-center empty">
                        Data masih kosong
                    </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</section>
@endsection


@section('script')

<script>
    const parentGallery = document.getElementById('parent-gallery')

    function addItem() {
        const children = $(parentGallery).children();
        // console.log(children.hasClass('empty'));
        if (children.hasClass('empty')) {
            return $(parentGallery).html(elementAddItem())
        }
        return $(parentGallery).prepend(elementAddItem())

    }

    function elementAddItem() {
        return `
        <div class="col-md-4 col-lg-3 col-6">
                        <img src="" alt="preview" class="w-100 img-thumbnail mb-2">
                        <div class="btn-group w-100" role="group" aria-label="Basic example">
                            <button class="btn btn-info">
                            <input style="position:absolute;inset:0;opacity:0;z-index:3;" type="file" class="form-control" onchange="previewImg(event)">
                            <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-danger "><i class="fas fa-trash"></i></button>
                        </div>
                       
                    </div>
        `;

    }

    function previewImg(e) {
        const [file] = e.target.files;
        let preview = e.target.parentElement.parentElement.previousElementSibling;

        let src = null;

        let extension = ['image/jpeg', 'image/png', 'image/jpg']
        let error = 0;
        let msgError = null
        if (file) {
            if (file.size > 2000000) {
                // 2mb
                msgError = 'Size gambar tidak boleh lebih dari 2mb'
                error++
            }

            if (!extension.includes(file.type)) {
                msgError = 'Gambar Harus berupa png, jpg, jpeg'
                error++
            }


            if (error == 0) {
                src = URL.createObjectURL(file)
            } else {
                src = null
                e.target.value = ''
                alert(msgError)
            }

        }
        preview.src = src

    }
</script>

@endsection