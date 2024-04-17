@extends('layouts/admin')@section('content')<div class="row">
    <div class="col">
        <h1 class="display-2">Add a Client Profile</h1>
    </div>
</div>
<div class="row">
    <form action="{{ route('clients.store') }}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif{{ csrf_field() }}<div class="mb-3"><label for="name" class="form-label">
            Name
        </label>
        <input type="text" class="form-control" id="name" name="name"
                aria-describedby="name"></div>
        <div class="mb-3"><label for="phone" class="form-label">Phone</label><input type="text"
                class="form-control" id="phone" name="phone" aria-describedby="phone"></div>
        <div class="mb-3"><label for="email" class="form-label">Email</label><input type="email"
                class="form-control" id="email" name="email" aria-describedby="email">
            @error('email')
                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        <div class="mb-3"><label for="address" class="form-label">Address</label><input type="text"
            class="form-control" id="address" name="address" aria-describedby="address"></div>
        
        </div><button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>@endsection
