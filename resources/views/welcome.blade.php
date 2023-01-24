@extends('layouts.app')
@section('content')
    <section class="container">
        <article class="row d-flex justify-content-end">
            <section class="col-12 col-md-10 text-center">
                <img src="{{ asset('images/logo.png') }}" class="w-50">
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
                                        <a class="btn btn-info btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $characters->links('vendor.pagination.bootstrap-5') }}
            </section>
            <section class="col-md-2 d-none d-md-block">
                <article class="row">
                    <section class="border border-dark  py-4 box">
                        <img src="https://cdn.shopify.com/s/files/1/0919/7320/products/leilanis-attic-rick-and-morty-logo-28413130309681.jpg?v=1635380142" class="w-100">
                        <h6 class="mb-3 mt-3">Desarrolladora Laravel</h6>
                        <h6 class="mb-0">Natalia Alexandra Castellanos Quintana</h6>
                        @include('layouts.detail')
                    </section>
                </article>
            </section>
        </article>
    </section>
@endsection