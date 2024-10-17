@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- main start --}}

        {{-- start content --}}
        <div class="container">
            <a class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#staticModal1" href="/new"
                style="color: #FFFFFF; text-decoration: none;"><i class="fa-solid fa-user"></i> New
                Employee </a>

            <div class="row g-3 align-items-center m-2">
                <div class="col-auto">
                    <form action="/employee" method="get">
                        <input type="search" name="search" id="inputSearch" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>

            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Birthdate</th>
                            <th>Age</th>
                            <th>Contact</th>
                            <th>Date/Time Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            use Carbon\Carbon;
                        @endphp
                        @foreach ($data as $index => $row)
                            <tr>
                                <th>{{ $index + $data->firstItem() }}</th>
                                <td>{{ $row->first_name . ' ' . $row->last_name }}</td>
                                <td>{{ date('M d, Y', strtotime($row->birthdate)) }}</td>
                                <td>{{ Carbon::parse($row->birthdate)->age }}</td>
                                <td>+63{{ $row->contact }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="/edit/{{ $row->id }}" class="btn btn-success">Edit <i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" data-id="{{ $row->id }}"
                                        data-name="{{ $row->first_name . ' ' . $row->last_name }}"
                                        class="btn btn-danger archive">Archive <i class="fa-solid fa-ban"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
        {{-- end content --}}


        {{-- main end --}}
    </div>
@endsection
