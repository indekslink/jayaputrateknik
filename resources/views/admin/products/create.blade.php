@extends('layouts.admin')
@section('title','Add Product')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('products.index')}}">Products</a></div>

            <div class="breadcrumb-item">Add Product</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">

                        <form action="{{route('products.store')}}" onsubmit="actionDisabled('.btn-save')" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <img src="" alt="preview image" class="img-thumbnail img-fluid product-img">
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" onchange="previewImg(event,'.product-img')" name="image" required class="form-control  @error('image') is-invalid @enderror">
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn-primary btn w-100 d-block my-3 add-items"><i class="fas fa-plus"></i> Add Item</button>
                                </div>

                                <div class="col-12 area-items">


                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-save float-right">Save</button>
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