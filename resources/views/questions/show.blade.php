@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $question->title }}
                    </div>
                    <div class="card-body">
                        {!! $question->body  !!}
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                {{--<--Votes-->--}}
                                <div>
                                    <a href="" title="Up Vote" class="d-block text-dark text-center">
                                        <i class="fa fa-caret-up fa-3x "></i>
                                    </a>
                                    <h4 class="m-0 text-center text-dark">
                                        {{ $question->votes_count }}
                                    </h4>
                                    <a href="" title="Down Vote" class="d-block text-dark text-center">
                                        <i class="fa fa-caret-down fa-3x "></i>
                                    </a>
                                </div>
                                {{--Mark as Fav--}}
                                <div class="ml-5 mt-2">
                                    <a href="" title="Mark as Favourite" class="d-block text-dark text-center">
                                        <i class="fa fa-star fa-2x "></i>
                                    </a>
                                    <h4 class="text-dark m-0">45</h4>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="text-muted flex-column">
                                    Asked : {{ $question->created_date }}
                                </div>
                                <div class="d-flex mb-2">
                                    <div>
                                        <img src="{{ $question->owner->avatar }}" alt="{{ $question->owner->name }}">
                                    </div>
                                    <div class="mt-2 ml-2">
                                        {{ $question->owner->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('answers._index_')
        @include('answers._create_')
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
