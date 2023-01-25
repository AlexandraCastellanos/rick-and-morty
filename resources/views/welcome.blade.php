@extends('layouts.app')
@section('content')
    <section class="container">
        <article class="row d-flex justify-content-end">
            <section class="col-12 col-md-10 text-center">
                <img src="{{ asset('images/logo.png') }}" class="w-50">
                {{ Form::open(['route' => '/', 'method' => 'post']) }}
                    <article class="row d-flex justify-content-center mt-4">
                        <section class="col-12 col-md-6">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Search" required name="search" id="search" value="{{ isset($search) ? $search : '' }}">
                                        <label for="search">Search</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select" required name="type-search" id="type-search">
                                            <option value="name">Name</option>
                                            <option value="status">Status</option>
                                            <option value="species">Species</option>
                                        </select>
                                        <label for="type-search">Type Search</label>
                                        <input type="hidden" id="type-search-search" value="{{ isset($type_search) ? $type_search : '' }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success mt-4">Search</button>
                        </section>
                    </article>
                {{ Form::close() }}
                @if(Session::has('sucess'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('sucess') }}
                    </div>
                @endif
            </section>
            <section class="col-12 col-md-2 text-center my-auto">
                <a href="{{ route('call') }}" class="btn btn-sm btn-info">
                    LLAMAR API
                </a>
            </section>
        </article>

        <article class="row mt-5">
            <section class="col-12 col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Species</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($characters as $character)
                                <tr>
                                    <td>{{ $character->api_id }}</td>
                                    <td>{{ $character->name }}</td>
                                    <td>{{ $character->status }}</td>
                                    <td>{{ $character->species }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm see-detail-button" onclick="see_details({{ @json_encode($character) }})">
                                            See Details
                                        </a>
                                        <a class="btn btn-info btn-sm" onclick="edit_character({{ @json_encode($character) }})">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $characters->appends(['type-search' => $type_search, 'search' => $search])->links('vendor.pagination.bootstrap-5') }}
            </section>
            <section class="col-md-2 d-none d-md-block">
                <article class="row">
                    <section class="border border-dark  py-4 box">
                        <img src="https://cdn.shopify.com/s/files/1/0919/7320/products/leilanis-attic-rick-and-morty-logo-28413130309681.jpg?v=1635380142" class="w-100">
                        <h6 class="mb-3 mt-3">Desarrolladora Laravel</h6>
                        <h6 class="mb-0">Natalia Alexandra Castellanos Quintana</h6>
                        @include('layouts.detail')
                        @include('edit')
                    </section>
                </article>
            </section>
        </article>
    </section>
@endsection