@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Projects
            <a class="btn btn-xs btn-primary pull-right" href="/projects/create">Create new</a>
        </div>
        <!-- <div class="panel-body">
            Panel content
        </div> -->
        <ul class="list-group">
            @foreach($projects as $project)
            {{-- $loop->first ? 'active' : '' --}}
            <li class="list-group-item ">
                <a href="/projects/{{$project->id}}" class="list-group-item-heading">{{$project->name}}</a>
                <p class="list-group-item-text">{{$project->description}}</p>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection