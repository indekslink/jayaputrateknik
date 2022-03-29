@extends('layouts.admin')
@section('title','Edit More Services')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit More Services</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('ms.index')}}">More Services</a></div>

            <div class="breadcrumb-item">Edit More Services</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="col-12">

                            <form action="{{route('ms.update',$ms->id)}}" onsubmit="actionDisabled('.btn-save')" method="post">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="section" value="ms">
                                <div class="row justify-content-center">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" value="{{old('title') ?? $ms->title}}" required class="form-control @error('title') is-invalid @enderror" name="title">
                                            @error('title')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea oninput="auto_grow(this)" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description') ?? $ms->description}}</textarea>

                                            @error('description')
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


@section('style')

<style>
    textarea {
        resize: none;
        overflow: hidden;
        min-height: 42px !important;

    }
</style>
@endsection

@section('script')
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }
</script>

@endsection