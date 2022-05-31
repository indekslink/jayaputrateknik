@extends('layouts.admin')
@section('title','Edit SEO Keywords')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit SEO Keywords</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('seo.index')}}">SEO Keywords</a></div>

            <div class="breadcrumb-item">Edit SEO Keywords</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="col-12">

                            <form action="{{route('seo.update',$seo->id)}}" onsubmit="actionDisabled('.btn-save')" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input autocomplete="off" autofocus type="text" value="{{old('name') ?? $seo->name}}" required class="form-control @error('name') is-invalid @enderror" name="name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <button type="submit" class="btn btn-success my-3 btn-save ">Update</button>
                            </form>
                        </div>





                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection