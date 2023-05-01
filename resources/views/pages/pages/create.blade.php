@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-8">
          <a href="{{ route('pages.index') }}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="card">
                <div class="card-header"><span>{{ __('Create Page') }}</span>
                </div>
                
                <div class="card-body">
                    <form action="{{route('pages.store')}}" method="POST">
                        @csrf
                        @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)

                                <li>{{$error}}</li>

                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                        @endif



                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Page name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Slug (link)</label>
                            <input name="slug" class="form-control" id="exampleFormControlTextarea1" placeholder="page link EX: (page-1 or page-2 or info-cars, pagename) etc..." value="{{old('slug')}}" />
                            <div class="form-text" id="basic-addon4">Page link must be unique and don't use spaces or special characters or slashes</div>
                        </div>
                        <button  class="btn btn-primary btn-sm" type="submit">Create </button>
                    </form>

               </div>
                    
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
