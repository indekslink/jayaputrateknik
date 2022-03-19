@extends('layouts.admin')
@section('title','Home')
@section('content')
<section class="section">

    <div class="alert alert-success">

        <h3 class="mb-0">Selamat datang di halaman managemen konten Website Jaya Putra Teknik</h3>
    </div>


    <div class="section-body">
        @if($messages->count() > 0)
        <div class="card card-primary">
            <div class="card-header">
                <h4>List Message</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
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
                                <td colspan="5" class="text-center">Data Masih Kosong</td>
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