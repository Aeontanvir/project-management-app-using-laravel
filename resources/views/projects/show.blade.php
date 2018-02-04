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
            <span class="clearfix">
            <br/>
            <hr/>
            <div class="panel panel-info">
                <div class="panel-body">
                    <form method="post" action="{{ route('comments.store') }}">
                        {{ csrf_field() }}


                        <input type="hidden" name="commentable_type" value="App\Models\Project">
                        <input type="hidden" name="commentable_id" value="{{$project->id}}">


                        <div class="form-group">
                            <label for="comment-content">Comment</label>
                            <textarea placeholder="Enter comment" 
                                    style="resize: vertical" 
                                    id="comment-content"
                                    name="body"
                                    rows="3" spellcheck="false"
                                    class="form-control autosize-target text-left">
                                    </textarea>
                        </div>

                    
                        <div class="form-group">
                            <label for="comment-content">Proof of work done (Url/Photos)</label>
                            <textarea placeholder="Enter url or screenshots" 
                                    style="resize: vertical" 
                                    id="comment-content"
                                    name="url"
                                    rows="2" spellcheck="false"
                                    class="form-control autosize-target text-left">

                                    
                                    </textarea>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-primary"
                                value="Submit"/>
                        </div>
                    </form>
                </div>
                
            </div>
            


            
        </div>
        <div class="col-sm-3">
            <div class="sidebar-module">
                <h4>Action</h4>
                <ol class="list-unstyled">
                    <li><a href="/projects/{{$project->id}}/edit">Edit Project</a></li>
                    <li><a href="/projects/create">Create new project</a></li>
                    <li><a href="/projects">All Projects</a></li>
                    @if($project->user_id == Auth::user()->id)
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
                    @endif
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