@extends('layouts.admin')
@section('title','Edit Product')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('products.index')}}">Products</a></div>

            <div class="breadcrumb-item">Edit Product</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="col-12">

                            <form action="{{route('products.update',$product->slug)}}" onsubmit="actionDisabled('.btn-save')" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" value="{{old('name') ?? $product->name}}" required class="form-control @error('name') is-invalid @enderror" name="name">
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
                                                <img src="/images/uploads/{{$product->image}}" alt="preview image" class="img-thumbnail img-fluid product-img">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" onchange="previewImg(event,'.product-img')" name="image" class="form-control  @error('image') is-invalid @enderror">
                                                    <input type="hidden" name="old_image" value="{{$product->image}}">
                                                    @error('image')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success my-3 btn-save ">Update</button>
                            </form>
                        </div>



                        <div class="col-12">
                            <button type="button" class="btn-primary btn w-100 d-block my-3 add-items"><i class="fas fa-plus"></i> Add Item</button>
                        </div>



                        <div class="col-12 area-items">
                            @if($product->items->count() > 0)
                            @foreach($product->items as $item)
                            <div class="row align-items-center mb-3 parent-item-{{$loop->iteration}}">
                                <div class="col-4">
                                    <img src="/images/uploads/{{$item->image}}" class="img-fluid img-thumbnail preview-item-{{$loop->iteration}}" alt="preview image">
                                </div>
                                <div class="col-8">

                                    <div class="form-group">
                                        <label>Image Item</label>
                                        <div class="input-group ">
                                            <input data-id="{{$item->id}}" onchange="previewImgItem(event,'.preview-item-{{$loop->iteration}}','.target-action-{{$loop->iteration}}','{{$loop->iteration}}')" type="file" name="image_item" class="form-control input-item-{{$loop->iteration}}" accept=".jpg, .png, .jpeg">


                                            <div class="input-group-append target-action-{{$loop->iteration}}">
                                                <button class="btn  btn-outline-danger" onclick="fetchDeleteItem(this,'.parent-item-{{$loop->iteration}}','{{$item->id}}')" type="button"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    let noItem = Number(`{{$product->items->count() > 0 ? $product->items->count() + 1 : 1 }}`);
    $('button.add-items').on('click', function() {
        const content = $(this);
        content.attr('disabled', true);

        $('.area-items').prepend(items());
        content.removeAttr("disabled");
        noItem++;

    })

    function fetchBtnHapus(no, id) {
        return `<button class="btn  btn-outline-danger" onclick="fetchDeleteItem(this,'.parent-item-${no}','${id}')" type="button"><i class="fas fa-trash"></i></button>`
    }

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
                                                <input  onchange="previewImgItem(event,'.preview-item-${noItem}','.target-action-${noItem}','${noItem}')" type="file" name="image_item[]" data-id="null" required class="form-control input-item-${noItem}" accept=".jpg, .png, .jpeg">
                                                    <div class="input-group-append target-action-${noItem}">
                                                    <button class="btn  btn-outline-danger" onclick="deleteItem('.parent-item-${noItem}')"  type="button"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>


                                               
                                            </div>
                                        </div>
                                    </div>`;
    }


    const saveItem = (no) => {
        return ` <button class="btn  btn-success"  onclick="fetchSave(this,'${no}')"  type="button">Save</button>`
    }
    const fetchSave = (e, no) => {
        e.disabled = true;
        let tombolHapus = e.nextElementSibling
        tombolHapus.disabled = true;


        const targetAct = document.querySelector(`.target-action-${no}`);
        const fileField = document.querySelector(`.input-item-${no}`);
        const id = fileField.getAttribute('data-id');

        let url = `{{route('api_update_or_create_item','id')}}`;
        url = url.replace('id', id);

        const formData = new FormData();

        formData.append('product_id', `{{$product->id}}`);
        formData.append('image', fileField.files[0]);


        fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                const {
                    id, //id dari data yang dibuat atau diupdate oleh sistem
                    msg
                } = result


                e.disabled = false
                fileField.setAttribute('data-id', id)
                $(targetAct).html(fetchBtnHapus(no, id))
                myAlert('success', msg)

            })
            .catch(error => {
                e.disabled = false
                tombolHapus.disabled = false;
                console.error('Error:', error);

            });

    }
    const previewImg = (e, target) => {
        const [file] = e.target.files;

        const el = document.querySelector(target);

        if (file) {
            el.src = URL.createObjectURL(file);
        }

    }
    const previewImgItem = (e, target, targetSave, nomorSave) => {
        const [file] = e.target.files;

        const el = document.querySelector(target);

        if (file) {

            if ($(targetSave).children().length == 1) {

                $(targetSave).prepend(saveItem(nomorSave))
            }
            return el.src = URL.createObjectURL(file);
        }
        if ($(targetSave).children().length > 1) {
            $(targetSave).children()[0].remove()
        }
        return el.src = '/'
    }
    const deleteItem = (id) => {
        document.querySelector(id).remove();
    }

    const fetchDeleteItem = (el, target, id) => {
        el.disabled = true;
        let url = `{{route('api_delete_item','id')}}`;
        url = url.replace('id', id);

        const data = {
            _method: 'DELETE',
            id
        };
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                deleteItem(target);
                myAlert('success', data.msg)
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
</script>
@endsection