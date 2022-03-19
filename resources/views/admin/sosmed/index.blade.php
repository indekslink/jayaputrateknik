@extends('layouts.admin')
@section('title','Social Media')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Social Media</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>

            <div class="breadcrumb-item">Social Media</div>
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
                <a href="{{route('sosmed.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">

                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Nama</th>
                                <th>Url</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @forelse($sosmed as $sm)
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>{{$sm->icon}}</td>
                                <td>{{$sm->name}}</td>
                                <td>{{$sm->url}}</td>

                                <td class="text-center">

                                    <a href="{{route('sosmed.edit',$sm->id)}}" class="btn btn-sm mx-1 btn-warning">Edit</a>
                                    <form action="{{route('sosmed.destroy',$sm->id)}}" method="post" onclick="showConfirm(this,event,'<h4>Hapus Data sm</h4> <h3><strong>{{$sm->name}}</strong></h3> <div><small>Item dari produk tersebut akan ikut terhapus!</small></div>')" class="mx-1 d-inline-block">
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
            <!-- <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>
</section>
@endsection