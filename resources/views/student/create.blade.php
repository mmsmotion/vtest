@extends("master")
@section("title") Student Create @stop
@section("content")
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="my-5">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error("name")
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="my-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @stop
