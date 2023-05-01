@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-8">
          <a href="{{route('home')}}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="card">
                <div class="card-header"><span>{{ __('Pages') }}</span>
                    <span class="float-end">
                        <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm">Add Page</a>
                    </span>
                
                </div>
                
                <div class="card-body">
                  @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                   @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug (link)</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($pages as $page )
                          <tr>
                            <th scope="row">{{$page->id}}</th>
                            <td>{{$page->name}}</td>
                            <td>{{$page->slug}}</td>
                            <td>  
                                <a href="javascript:void(0)" onclick="
                                 event.preventDefault();
                                  if(!confirm('Are you sure you want to delete this page?'))
                                  {
                                    return false;  
                                  }
                                  document.getElementById('delete-form').submit()
                                  " class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{url($page->slug)}}" target="_blank" class=" mx-1 btn btn-primary btn-sm"> visit page</a>
                                <a href="{{route('images',$page->slug)}}" class="btn btn-success btn-sm">Images</a>
                                <form action="{{route('pages.destroy',$page->id)}}" method="POST" class="d-none" id="delete-form">
                                  @method('DELETE')
                                  @csrf
                                  <button>delete</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <div class="d-flex justify-content-center">
                        {!! $pages->links() !!}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
