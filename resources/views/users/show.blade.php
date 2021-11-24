@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Show') }}</div>

                <div class="card-body">
                    <form action ="" method="POST">
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{$User->name}}" name="name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                    <textarea  name="email" class="form-control" readonly>{{$User->email}}</textarea>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection