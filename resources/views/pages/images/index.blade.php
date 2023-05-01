@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-8">
          <a href="{{route('pages.index')}}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="card">
                <div class="card-header"><span>{{ __('Images') }}</span>
                    <span class="float-end">
                        <a href="{{ route('images.create',$slug) }}" class="btn btn-primary btn-sm">Add Image</a>
                    </span>
                
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
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($images as $image )
                            
                         
                          <tr>
                            <th scope="row">{{$image->id}}</th>
                            <td>
                                <img src="{{asset($image->path)}}" class="img-thumbnail rounded img-fluid" style="max-width: 200px;" >
                            </td>
                            <td>  
                              <a href="javascript:void(0)" onclick="
                              event.preventDefault();
                               if(!confirm('Are you sure you want to delete this page?'))
                               {
                                 return false;  
                               }
                               document.getElementById('delete-form').submit()
                               " class="btn btn-danger btn-sm">Delete</a>
                                <form action="{{route('images.delete')}}" method="POST" class="d-none" id="delete-form">
                                  <input type="text" hidden value="{{$image->id}}" name="id">
                                  @csrf
                                  <button>delete</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-center">
                        {!! $images->links() !!}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
