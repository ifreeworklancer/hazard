@extends('layouts.admin', ['page_title' => 'Страницы'])

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <th scope="row">{{ $page->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.pages.edit', $page) }}" class="text-capitalize">
                                            {{ $page->title }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection