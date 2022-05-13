@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir archivos')}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('filesadmin.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="files[]" multiple required>

                        <div class="row">
                            <div class="form-group col-md-8">
                              <label></label>
                              <select name="users" class="form-control">
                                <option selected disabled>Elige un usuario para asociarlo</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <button type="submit" class="mt-4 btn btn-primary float-right">
                            Subir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection