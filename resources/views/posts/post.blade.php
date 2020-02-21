@extends('layouts.app')
{{-- @section('title', $title.' - K700  Азия')
@section('description', $description) --}}
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <h1 class="ui header">{{$post->name}}
            <div class="sub header">
                <div class="ui breadcrumb">{{$post->category}}
                </div>
            </div>
        </h1>
        <div class="ui grid container">
            <div class="row">
                {!! $post->description !!}
            </div>
        </div>
    </div>
@endsection