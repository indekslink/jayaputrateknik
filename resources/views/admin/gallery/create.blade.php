@extends('layouts.admin')
@section('title','Add Galleries')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Galleries</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('galleries.index')}}">Galleries</a></div>

            <div class="breadcrumb-item">Add Galleries</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">

                        <form action="{{route('sosmed.store')}}" onsubmit="actionDisabled('.btn-save')" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                @csrf

                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <img src="/images/1.png" alt="" class="img-fluid img-thumbnail">
                                        </div>
                                        <div class="col-8">
                                            <div class="input-group">
                                                <input onchange="previewImg(event,'.preview-item-${noItem}')" type="file" name="image_item[]" required class="form-control" accept=".jpg, .png, .jpeg">
                                                <div class="input-group-append">
                                                    <button class="btn  btn-outline-danger" onclick="deleteItem('.parent-item-${noItem}')" type="button">Delete</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



@section('script')
<script>
    let noItem = 1;
    $('button.add-items').on('click', function() {
        const content = $(this);
        content.attr('disabled', true);

        $('.area-items').prepend(items());
        content.removeAttr("disabled");
        noItem++;

    })

    function items() {
        return `
                    <div class="row align-items-center mb-3 parent-item-${noItem}">
                                        <div class="col-4">
                                            <img src="" class="img-fluid img-thumbnail preview-item-${noItem}" alt="preview image">
                                        </div>
                                        <div class="col-8">
                                           
                                            <div class="form-group">
                                                <label>Image Item</label>
                                               

                                           
                                                <div class="input-group ">
                                                <input  onchange="previewImg(event,'.preview-item-${noItem}')" type="file" name="image_item[]" required class="form-control" accept=".jpg, .png, .jpeg">
                                                    <div class="input-group-append">
                                                    <button class="btn  btn-outline-danger" onclick="deleteItem('.parent-item-${noItem}')"  type="button">Delete</button>
                                                    </div>
                                                </div>


                                               
                                            </div>
                                        </div>
                                    </div>`;
    }

    const previewImg = (e, target) => {
        const [file] = e.target.files;
        const el = document.querySelector(target);
        if (file) {
            el.src = URL.createObjectURL(file);
        }
    }
    const deleteItem = (id) => {
        document.querySelector(id).remove();
    }
</script>
@endsection