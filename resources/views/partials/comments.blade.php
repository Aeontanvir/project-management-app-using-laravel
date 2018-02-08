<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-comment"></span> 
            Recent Comments
        </h3>
    </div>
    <div class="panel-body">
        <ul class="media-list">
            
            @foreach($comments as $comment)
            <li class="media">
                <div class="media-left">
                    <img src="http://placehold.it/60x60" class="img-circle">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <small> 
                        
                        <a href="users/{{$comment->user->id}} " > {{ $comment->user->first_name}} {{ $comment->user->last_name}}
                    -  {{ $comment->user->email}} </a> 
                    <br>
                            commented on {{ $comment->created_at}}
                        </small>
                    </h4>
                    <p>
                    {{ $comment->body }}
                    </p>
                    <b> Proof: </b>
                    <p>
                    {{ $comment->url }}
                    </p>
                </div>
            </li>

            @endforeach
        </ul>
        <hr/>
        <form method="post" action="{{ route('comments.store') }}">
            {{ csrf_field() }}


            <input type="hidden" name="commentable_type" value="{{$commentable_type}}">
            <input type="hidden" name="commentable_id" value="{{$commentable_id}}">


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
