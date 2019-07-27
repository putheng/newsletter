@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">{{ $news->title }}</h4>

                <div class="card-body">
                    <div>
                        <label for="description" class="d-flex justify-content-between">
                            <span>By <strong>{{ $news->user->name }}</strong></span>
                            <span class="text-muted">
                                Posted <strong>{{ $news->created_at->format('M d, Y') }}</strong>
                            </span>
                        </label><br>
                    </div>
                    <div class="text-center">
                        <img class="img-fluid" src="{{ $news->image->url }}" alt="{{ $news->title }}">
                        <br><br>
                    </div>
                    
                    <div>
                        {!! nl2br($news->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection