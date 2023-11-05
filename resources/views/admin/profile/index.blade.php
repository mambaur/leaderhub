@extends('admin.layouts.main', ['title' => @$user->name, 'menu' => 'profiles', 'submenu' => null])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile</h4>
                        <form class="forms-sample" method="post" action="{{ route('profile_update', $user->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') ?? @$user->name }}" name="name"
                                    placeholder="Name..." required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control h-100 @error('email') is-invalid @enderror"
                                    id="email" value="{{ old('email') ?? @$user->email }}" name="email"
                                    placeholder="Email..." required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if (@$user->getRoleNames()[0] == 'superadmin' && @$user->email != 'garudafiberapp@gmail.com')
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                    style="height: 46px"
                                        id="role">
                                        <option value="superadmin" @if ((old('role') ?? @$user->getRoleNames()[0]) == 'superadmin') selected @endif>Super
                                            Admin
                                        </option>
                                        <option value="admin" @if ((old('role') ?? @$user->getRoleNames()[0]) == 'admin') selected @endif>Admin
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control h-100 @error('password') is-invalid @enderror"
                                    id="password" value="{{ old('password') }}" name="password" placeholder="Password...">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Re-type Password</label>
                                <input type="password"
                                    class="form-control h-100 @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" value="{{ old('password_confirmation') }}"
                                    name="password_confirmation" placeholder="Re-type Password...">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
