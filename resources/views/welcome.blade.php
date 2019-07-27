@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Top News</h4>

                <div class="card-body">
                @if($news->count())
                    @foreach($news as $item)
                        <div class="media">
                            <a href="{{ route('news.show', $item) }}">
                                <img width="200" class="mr-3"
                                    src="{{ $item->image->url }}" alt="{{ $item->title }}">
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <a href="{{ route('news.show', $item) }}">
                                        {{ $item->title }}
                                    </a>
                                </h5>
                                {{ str_limit($item->description, 200) }}
                                <a href="{{ route('news.show', $item) }}">Read More</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    {{ $news->links() }}
                @else
                    <p>No any news</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection