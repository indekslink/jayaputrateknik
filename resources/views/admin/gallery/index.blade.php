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


        <button class="btn btn-primary  btn-lg add-gallery mb-2 " type="button">
            <div>
                <i class="fas fa-plus"></i> Add
            </div>

            <input type="file" onchange="previewImg(event)" multiple accept=".jpg, .png, .jpeg, .mp4">
        </button>

        <button type="button" class="btn btn-success btn-lg save-img mb-2 ml-3 d-none" onclick="saveImage(this)">Save</button>
        <button type="button" class="btn btn-danger btn-lg delete-item mb-2 ml-3 d-none" onclick="deleteItem(this)">Delete Item </button>


        <div class="preview my-2">
            <div class="row">

            </div>
        </div>


        <div class="row data-saved">
            @if($galleries->count()>0)
            <div class="col-12">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checklist-item all" tabindex="3" id="check-all">
                        <label class="custom-control-label" for="check-all">Pilih Semua</label>
                    </div>
                </div>
            </div>
            @endif
            @forelse($galleries as $date => $items)
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">


                            <div class="col-12  mt-4">
                                <h4>{{date('d-m-Y') == $date ? 'Baru Diupload' : $date}}</h4>
                            </div>
                            @foreach($items as $gallery)
                            <div class="col-md-4 col-lg-3 p-2 col-6 item-gallery">

                                @if(explode('.',$gallery->item)[1] == 'mp4')
                                <video controls class="img-fluid img-thumbnail">
                                    <source src="/images/uploads/gallery/{{$gallery->item}}">
                                    </source>
                                </video>
                                @else
                                <img src="/images/uploads/gallery/{{$gallery->item}}" alt="gallery" class="img-thumbnail img-fluid">
                                @endif
                                <div class="form-group check-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" data-id="{{$gallery->id}}" class="custom-control-input checklist-item" id="{{$gallery->id}}" tabindex="3">
                                        <label class="custom-control-label" for="{{$gallery->id}}"></label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @empty

            <div class="col-12 text-center empty">
                Data masih kosong
            </div>
            @endforelse
        </div>

        @method('DELETE')

    </div>
</section>
@endsection
@section('style')
<style>
    .add-gallery {
        position: relative;
    }

    .add-gallery input {
        position: absolute;
        inset: 0;
        z-index: 9999;
        opacity: 0;
    }

    .data-saved video,
    .data-saved img {
        height: 100%;
        object-fit: cover;
    }

    .data-saved .item-gallery {
        position: relative;
    }

    .data-saved .item-gallery .check-item {
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 3;
    }
</style>

@endsection

@section('script')

<script>
    let currentFiles = null;

    function saveImage(e) {
        e.disabled = true;
        e.textContent = 'Loading...';
        let fd = new FormData();
        // return console.log(currentFiles)
        currentFiles.forEach((file, i) => {
            fd.append('items[]', file);
        })

        let url = `{{route('add_galleries')}}`;
        fetch(url, {
                method: 'POST',

                body: fd,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == 'error') {
                    console.error('Error : ', msg);
                    return myAlert("error", 'Oops, ada kesalahan saat proses penguploadan');
                }
                myAlert('success', data.msg)
                window.location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
                e.disabled = false
                e.textContent = 'Save';
                myAlert("error", 'Oops, ada kesalahan saat proses penguploadan')
            });


    }

    function clearPreview() {
        const dataSaved = $('.data-saved .row');
        const preview = $('.preview .row');
        if (dataSaved.children().hasClass('empty')) {
            dataSaved.html(preview.html())
        } else {

            dataSaved.prepend(preview.html())
        }
        preview.empty();
    }

    function previewImg(e) {
        const files = Array.from(e.target.files);
        currentFiles = files;
        // return console.log(files)
        if (files.length > 0) {
            let preview = '';
            let error = 0;
            let msg = null;
            files.forEach(file => {

                let url = URL.createObjectURL(file);
                const typeFile = file.type.split('/')[0];
                if (typeFile == "video") {
                    if (file.size > 10000000) {
                        error++;
                        msg = 'Video yng dipilih , tidak boleh lebih dari 10MB';
                    }
                    preview += video(url)
                } else {
                    if (file.size > 1000000) {
                        error++;
                        msg = 'Foto yng dipilih , tidak boleh lebih dari 1MB';
                    }
                    preview += img(url)
                }
            })
            if (error > 0) {
                return errorPreview(msg)
            }
            $('.preview .row').html(preview);
            $('.save-img').removeClass('d-none')
        } else {
            errorPreview()
        }
    }



    function errorPreview(msg = null) {
        $('.preview .row').empty();
        $('.save-img').addClass('d-none')
        if (msg) {

            alert(msg)
        }
    }

    function img(url) {
        return `
        <div class="col-md-4 col-lg-3 p-2 col-sm-6">
                    <img src="${url}" alt="gallery" class="img-thumbnail img-fluid">
                </div>
        `
    }

    function video(url) {
        return `
        <div class="col-md-4 col-lg-3 p-2 col-sm-6">
        <video controls class="img-fluid img-thumbnail">
            <source src="${url}"></source>
        </video>
                   
                </div>
        `
    }



    let itemChecklist = [];
    $('.checklist-item.all').on('change', function() {
        const isChecklist = $(this);



        if (isChecklist.is(':checked')) {
            $('.checklist-item:not(.all)').each((i, val) => {
                const id = $(val).data('id');
                if (!itemChecklist.includes(id)) {
                    itemChecklist.push(id);
                }
                $(val).prop('checked', true)

            })
        } else {
            $(".checklist-item").prop('checked', false)
            itemChecklist = []
        }


        showHideDelete()
    })
    $('.checklist-item:not(.all)').on('change', function() {
        const isChecklist = $(this);


        const id = isChecklist.data('id');
        // console.log(id)
        if (isChecklist.is(':checked')) {
            itemChecklist.push(id);
        } else {
            if (itemChecklist.includes(id)) {
                itemChecklist.splice(itemChecklist.indexOf(id), 1);
            }
        }

        if (itemChecklist.length == $('.checklist-item:not(.all)').length) {
            $('.checklist-item.all').prop('checked', true)
        } else {
            $('.checklist-item.all').prop('checked', false)

        }
        showHideDelete()


    })


    function showHideDelete() {
        if (itemChecklist.length > 0) {

            document.querySelector('button.delete-item').classList.remove('d-none')
        } else {

            document.querySelector('button.delete-item').classList.add('d-none')
        }
    }

    function deleteItem(e) {
        e.disabled = true;
        e.textContent = 'Loading...';
        let url = `{{route('delete_galleries')}}`;

        const data = {
            _method: 'DELETE',
            id: itemChecklist
        }

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {

                if (data.status == 'error') {
                    console.error('Error : ', data.msg);
                    e.disabled = false;
                    e.textContent = 'Loading';
                    return myAlert("error", 'Oops, ada kesalahan saat proses penghapusan');
                }
                myAlert('success', data.msg)
                window.location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
                e.disabled = false;
                e.textContent = 'Loading';
                myAlert("error", 'Oops, ada kesalahan saat proses penghapusan')
            });

    }
</script>

@endsection