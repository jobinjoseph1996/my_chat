@extends('layouts.main_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="container">
                            <h3>Feeds</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="row m-4">
                                    @csrf
                                    @if( session('message'))
                                    <div class="col-sm-12 alert {{ session('alert-class') }}">{{ session('message') }}</div>
                                    @endif
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                {{-- <th class="text-center"><Sl id=""></Sl></th> --}}
                                                <th class="text-center">Latest Feeds</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!$user->isEmpty())
                                            @foreach($user as $key => $value)
                                            <tr>
                                                {{-- <td class="text-center">{{ $value->id }}</td> --}}
                                                <td class="text-center">{{ ucwords($value->name) }} signup at {{ \Carbon\Carbon::createFromTimestamp(strtotime($value->created_at))->format('d-m-Y h:i A')}}</td>
                                               
                                            </tr>
                                            @endforeach
                                           @endif
                                           @if(!$user_messages->isEmpty())
                                            @foreach($user_messages as $key => $values)
                                            <tr>
                                                {{-- <td class="text-center">{{ $values->id }}</td> --}}
                                                <td class="text-center">{{ ucwords($values->user->name) }} create a message</td>
                                               
                                            </tr>
                                            @endforeach
                                           @endif
                                           @if(!$delete_messages->isEmpty())
                                            @foreach($delete_messages as $key => $val)
                                            <tr>
                                                {{-- <td class="text-center">{{ $val->id }}</td> --}}
                                                <td class="text-center">{{ ucwords($val->user->name) }}  delete a message</td>
                                               
                                            </tr>
                                            @endforeach
                                           @endif
                                        </tbody>
                
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
