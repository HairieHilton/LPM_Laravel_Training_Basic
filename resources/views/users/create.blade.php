@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(Users Show') }}</div>

                <div class="card-body">
                        <div class="form group">
                            <label>Title</label>
                            <input type="text" value= "{{ $user->title }}" name="title" class="form-control"placeholder="Please fill in your title" readonly>
                        </div>
                        <div class="form group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"placeholder="Add your description" readonly>{{ $user->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">create New Schedules</button>
                        

                            <div class="form group">
                            <label>Title</label>
                            <input type="text" value= "{{ $user->title }}" name="title" class="form-control"placeholder="Please fill in your title" readonly>
                        </div>
                        <div class="form group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"placeholder="Add your description" readonly>{{ $user->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">create New Schedules</button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
