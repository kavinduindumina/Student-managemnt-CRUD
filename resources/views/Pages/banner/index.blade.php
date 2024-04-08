@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Banner List</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" name="title" type="text"  placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <input class="form-control mt-5" name="image" type="file"  placeholder="Enter name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $key => $banner)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $banner->title }}</td>
                            <td>
                                @if ($banner->done == 0)
                                <span class="badge bg-danger">Inactive</span>

                                @else
                                <span class="badge bg-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('banner.delete',$banner->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ route('banner.status',$banner->id) }}" class="btn btn-success"><i class="fa-sharp fa-solid fa-circle-check"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
    <style>
        .page-title{
            padding-top: 10vh;
            font-size: 5rem;
            color: rgb(43, 226, 214);
        }
    </style>
@endpush
