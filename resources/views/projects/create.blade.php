@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-10 ">
                    <h1>Create Project</h1>
                    <form
                        method="POST"
                        action="{{route('projects.store')}}"
                    >
                        {{ csrf_field() }}
                        @if($companies == null)
                            <input   
                            class="form-control"
                            type="hidden"
                                    name="company_id"
                                    value="{{ $company_id }}"
                                    />
                            </div>

                        @endif

                        @if($companies != null)
                        <div class="form-group">
                            <label for="company-content">Select company</label>

                            <select name="company_id" class="form-control" > 

                            @foreach($companies as $company)
                                    <option value="{{$company->id}}"> {{$company->name}} </option>
                                    @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" 
                                required 
                                name="name" 
                                class="form-control" 
                                id="name" 
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="name">Duration</label>
                            <input type="number" 
                                required 
                                name="days" 
                                class="form-control" 
                                id="name" 
                                value="">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" 
                                required 
                                name="description" 
                                rows="5" 
                                id="description"></textarea>
                        </div>
                        <hr/>
                        <div class="pull-right">
                            <button type="reset" class="btn btn-info">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>


        <div class="col-sm-3">
            <!-- <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div> -->
            <div class="sidebar-module">
                <h4>Action</h4>
                <ol class="list-unstyled">
                    <li><a href="/projects">All Project</a></li>
                </ol>
            </div>
            <!-- <div class="sidebar-module">
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
            </div> -->

        </div>
    </div>
</div>

@endsection