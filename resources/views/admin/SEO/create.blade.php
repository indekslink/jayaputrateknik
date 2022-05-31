@extends('layouts.admin')
@section('title','Add SEO Keywords')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add SEO Keywords</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('seo.index')}}">SEO Keywords</a></div>

            <div class="breadcrumb-item">Add SEO Keywords</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">

                        <form action="{{route('seo.store')}}" onsubmit="actionDisabled('.btn-save')" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" autofocus>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
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