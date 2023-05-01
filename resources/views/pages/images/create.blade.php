@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-8">
          <a href="{{ route('images',$slug) }}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="card">
                <div class="card-header"><span>{{ __('Image') }}</span>
                
                </div>
                
                <div class="card-body">
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
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{session()->get('error')}}
                        </div>
                        
                    @endif


                 <form action="{{route('images.store',$slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Select Image</label>
                        <input type="file" name="image" class="form-control" id="inputGroupFile01">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                </form>
                    
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
