@extends('layouts.default')

@section('page_title')
    Map
@endsection

@section('styles')

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>
@endsection

@section('content')
    <div class="map-wrapper map-responsive">
        <homemap></homemap>
    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')

@endsection