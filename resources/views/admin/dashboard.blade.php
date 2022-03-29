@extends('layouts.admin')
@section('title','Home')
@section('content')
<section class="section">


    <div class="section-header">
        <h1>Selamat datang di halaman managemen konten Website Jaya Putra Teknik</h1>

    </div>

    <div class="section-body">
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
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>What We Offer</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{route('wwe.create')}}" class="btn btn-primary btn-icon mb-4"><i class="fas fa-plus"></i></a>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody class="body-what-we-offer">

                                    @forelse($wwe as $w)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$w->title}}</td>
                                        <td>{!! $w->description !!}</td>
                                        <td>
                                            <a href="{{route('wwe.edit',$w->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('wwe.destroy',$w->id)}}" class="d-inline-block" method="post" onclick="showConfirm(this,event,'<h4>Hapus Data</h4> <h3><strong>{{$w->title}}</strong></h3>')">
                                                @csrf

                                                @method("DELETE")
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>

                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-md-center">Data Masih Kosong</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>More Services</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{route('ms.create')}}" class="btn btn-primary btn-icon mb-4"><i class="fas fa-plus"></i></a>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody class="body-what-we-offer">

                                    @forelse($ms as $w)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$w->title}}</td>
                                        <td>{!! $w->description !!}</td>
                                        <td>
                                            <a href="{{route('ms.edit',$w->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                            <form action="{{route('ms.destroy',$w->id)}}" class="d-inline-block" method="post" onclick="showConfirm(this,event,'<h4>Hapus Data</h4> <h3><strong>{{$w->title}}</strong></h3>')">
                                                @csrf

                                                @method("DELETE")
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-md-center">Data Masih Kosong</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($messages->count() > 0)
        <div class="card card-primary">
            <div class="card-header">
                <h4>List Message from Web Mail</h4>

            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <h5 class="pl-4">Total : {{$messages->total()}}</h5>
                    <table class="table table-striped table-md">

                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Messages</th>
                                <th>Action</th>
                            </tr>
                            @forelse($messages as $msg)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{\Carbon\Carbon::parse($msg->created_at)->diffForHumans()}}</td>
                                <td>{{$msg->first_name}} {{$msg->last_name}}</td>
                                <td>{{$msg->subject}}</td>
                                <td>{{$msg->message}}</td>
                                <td>
                                    <a href="mailto:{{$msg->email}}?subject={{$msg->subject}}" class="btn btn-info">Balas</a>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-md-center">Data Masih Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer text-right">
                {{$messages->links()}}
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@section('style')

<style>
    ul.pagination {
        justify-content: flex-end !important;
    }
</style>
@endsection