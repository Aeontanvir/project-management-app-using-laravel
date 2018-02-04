@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Companies
            <a class="btn btn-xs btn-primary pull-right" href="/companies/create">Create new</a>
        </div>
        <!-- <div class="panel-body">
            Panel content
        </div> -->
        <ul class="list-group">
            @foreach($companies as $company)
            {{-- $loop->first ? 'active' : '' --}}
            <li class="list-group-item ">
                <a href="/companies/{{$company->id}}" class="list-group-item-heading">{{$company->name}}</a>
                <p class="list-group-item-text">{{$company->description}}</p>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection