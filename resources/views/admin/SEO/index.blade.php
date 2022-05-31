@extends('layouts.admin')
@section('title','SEO Keywords')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>SEO Keywords</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>

            <div class="breadcrumb-item">SEO Keywords</div>
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
                <a href="{{route('seo.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">

                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Keywords</th>

                                <th class="text-center">Action</th>
                            </tr>
                            @forelse($SEO as $se)
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>{{$se->name}}</td>

                                <td class="text-center">

                                    <a href="{{route('seo.edit',$se->id)}}" class="btn btn-sm mx-1 btn-warning">Edit</a>
                                    <form action="{{route('seo.destroy',$se->id)}}" method="post" onclick="showConfirm(this,event,'<h4>Hapus Data se</h4> <h3><strong>{{$se->name}}</strong></h3> <div><small>Item dari produk tersebut akan ikut terhapus!</small></div>')" class="mx-1 d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Masih Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection