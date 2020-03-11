@extends('layouts.admin', ['page_title' => 'Пользователи'])

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
                                <th scope="col">Ник</th>
                                <th scope="col">Email</th>
                                <th scope="col">Дата регистрации</th>
                                <th scope="col">Опции</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-capitalize">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d.m.Y \в H:i') }}</td>
                                    <td>
                                        <p class="mb-0">
                                            <a href="{{ route('admin.users.destroy', $user) }}"
                                               class="btn btn-sm btn-danger">
                                                Удалить
                                            </a>
                                        </p>
                                        <form action="{{ route('admin.users.destroy', $user) }}"
                                              id="delete-form-{{ $user->id }}" method="post" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
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

    <?php echo $users->links(); ?>


@endsection

