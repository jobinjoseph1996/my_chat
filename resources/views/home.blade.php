@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(isset($user_edit))
                    <form method="POST" name="message_form" id="message_form" action="{{ route('home-update', $user_edit->id) }}">
                        <div class="row form-outline">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="edit_id" id="edit_id" value="{{$user_edit->id}}">
                            <textarea class="form-control" id="txt_message" rows="4" name="txt_message">{{$user_edit->message}}</textarea>
                            <label class="form-label" for="txt_message">Message</label>
                          </div>
                        <div class="row m-2">
                            <input type="submit" class="btn btn-primary" value="Update">
    
                        </div>
                    </form>
                    @else
                    <form method="POST" name="message_form" id="message_form" action="{{ route('home.store') }}">
                        <div class="row form-outline">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                            <textarea class="form-control" id="txt_message" rows="4" name="txt_message"></textarea>
                            <label class="form-label" for="txt_message">Message</label>
                          </div>
                        <div class="row m-2">
                            <input type="submit" class="btn btn-primary" value="Save">
    
                        </div>
                    </form>
                    @endif
                    
                    @if(isset($user))
                    <div class="row table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$user->isEmpty())
                                @foreach($user as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $value->id }}</td>
                                    <td class="text-center">{{ ucfirst($value->message) }}</td>
                                    <td class="text-center">{{ $value->created_at->format('d-m-Y h:i A') }}</td>
                                    <td class="text-center">
                                        {{-- <span class="badge badge-pill badge-primary"> --}}
                                            <a href="{{ url('home/'.$value->id.'/edit') }}" class="link-primary">Edit</a>
                                        {{-- </span> --}}
                                        {{-- <span class="badge badge-pill badge-danger"> --}}
                                            <a href="{{ route('home.destroy', [$value->id]) }}" class="link-danger">Delete</a>
                                        {{-- </span> --}}
                                    </td>
                                   
                                </tr>
                                @endforeach
                                @else
                                <td class="text-center" colspan="6" style="color:red;">No records found.</td>
                                @endif
                            </tbody>
    
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
