@extends('layouts.admin')
@section('title','Edit Social Media')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Social Media</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('sosmed.index')}}">Social Media</a></div>

            <div class="breadcrumb-item">Edit Social Media</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="col-12">

                            <form action="{{route('sosmed.update',$sosmed->id)}}" onsubmit="actionDisabled('.btn-save')" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" value="{{old('name') ?? $sosmed->name}}" required class="form-control @error('name') is-invalid @enderror" name="name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Url</label>
                                            <input type="text" value="{{old('url') ?? $sosmed->url}}" required class="form-control @error('url') is-invalid @enderror" name="url">
                                            @error('url')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type="text" value="{{old('icon') ?? $sosmed->icon}}" required class="form-control @error('icon') is-invalid @enderror" name="icon">
                                            @error('icon')
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