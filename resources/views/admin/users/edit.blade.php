@extends('layouts.admin', ['page_title'=> $user->name])

@section('content')

    <section id="content">
        <form action="{{ route('admin.users.update', $user) }}" method="post">
            @csrf
            @method('patch')

            <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}"
                       required>
                @if($errors->has('name'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="role">Роль</label>
                <select name="role" id="role" class="form-control">
                    @foreach(\App\Models\User::$roles as $role => $name)
                        <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="{{ old('email') ?? $user->email }}" required readonly>
                @if($errors->has('email'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </section>

@endsection