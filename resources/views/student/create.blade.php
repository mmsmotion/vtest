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
                        <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error("name")
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Email</label>
                        <input type="text"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error("email")
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                   <div class="mb-3">
                       <label class="form-label">Select Your Gender</label>
                       @foreach(\App\Models\Custom::$gender as $g)
                           <div class="form-check">
                               <input class="form-check-input" value="{{ $g }}" {{ $g==old('gender') ? 'checked' : '' }} type="radio" name="gender" id="{{ $g }}">
                               <label class="form-check-label" for="{{ $g }}">
                                   {{ $g }}
                               </label>
                           </div>
                       @endforeach
                       @error("gender")
                       <p class="small text-danger">{{ $message }}</p>
                       @enderror
                   </div>

                    <div class="mb-3">
                        <label class="form-label">Select Skills</label>
                        @foreach(\App\Models\Custom::$skill as $s)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" {{ in_array($s,old('skill',[])) ? 'checked' : '' }} name="skill[]" value="{{ $s }}" id="{{ $s }}">
                            <label class="form-check-label" for="{{ $s }}">
                                {{ $s }}
                            </label>
                        </div>
                        @endforeach
                        @error("skill")
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                        @error("skill.*")
                        <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
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
