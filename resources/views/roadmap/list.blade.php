@extends('layouts.default')

@section('page_title')
    Roadmap
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Roadmap</h1>
        </div>

        <ul class="timeline">
            @foreach($roadmap as $road)
                @if($road->position === 'left')
                    <li>
                @else
                    <li class="timeline-inverted">
                @endif
                        <div class="timeline-badge">
                            <i class="fa fa-{{ $road->icon }}"></i>
                        </div>

                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{ $road->title }}</h4>
                                <p>
                                    <small class="text-muted">
                                        <i class="fa fa-calendar"></i>
                                        {{ $road->created_at->diffForHumans() }}
                                    </small>
                                </p>
                            </div>

                            <div class="timeline-body">
                                <p>{{ $road->body }}</p>
                            </div>

                            @if($road->action_url && $road->action_title)
                                <hr>
                                <a class="btn btn-info" href="{{ $road->action_url }}">{{ $road->action_title }}</a>
                            @endif
                        </div>
                    </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')

@endsection