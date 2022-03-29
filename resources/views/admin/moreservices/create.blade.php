@extends('layouts.admin')
@section('title','Add More Services')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add More Services</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('sosmed.index')}}">More Services</a></div>

            <div class="breadcrumb-item">Add More Services</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">

                        <form action="{{route('ms.store')}}" onsubmit="actionDisabled('.btn-save')" method="post">
                            <div class="row justify-content-center">
                                @csrf
                                <input type="hidden" name="section" value="ms">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" required class="form-control @error('title') is-invalid @enderror" name="title">
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea oninput="auto_grow(this)" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>

                                        @error('description')
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


@section('script')
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }
</script>

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