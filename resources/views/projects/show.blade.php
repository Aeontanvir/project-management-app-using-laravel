@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="well well-lg">
                <h1>{{ $project->name }}</h1>
                <p class="lead">{{ $project->description }}</p>
                
            </div>

            <a class="btn btn-sm btn-primary pull-right" href="/projects/create">Add Project</a>
            <hr size="30">

            {{-- <div class="row">
                @foreach($project->projects as $project)
                <div class="col-md-4">
                    <h2>{{$project->name}}</h2>
                    <p>{{ str_limit($project->description, 200 ) }}</p>
                    <p><a class="btn btn-primary" href="projects/{{$project->id}}" role="button">View details &raquo;</a></p>
                </div>
                @endforeach
            </div> --}}
        </div>
        <div class="col-sm-3">
            <!-- <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div> -->
            <div class="sidebar-module">
                <h4>Action</h4>
                <ol class="list-unstyled">
                    <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
                    <li><a href="/projects/create">Create new project</a></li>
                    <li><a href="/projects">All Projects</a></li>
                    <li><a href="#" 
                        onclick="
                            var result = confirm('Are you sure tou wish to delete this Project');
                                console.log(result);
                            if(result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                        "
                        >
                        Delete
                        </a>
                        <form 
                            id="delete-form"
                            action="{{ route('projects.destroy', [$project->id]) }}" 
                            method="POST" 
                            style="display: none;"
                        > 
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li><a href="/projects/create">Add Project</a></li>
                    <!-- <li><a href="#">Add new member</a></li> -->
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Members</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

@endsection