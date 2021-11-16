<div class="card bg-none card-box">
     {{Form::open(array('url'=>'comment/add','method'=>'post'))}}
    <div class="row">
        <div class="col-12">
                    <h6>Display Comments</h6>
                    @foreach($warning->comments as $comment)
                      {{$warning}}
                        <div class="display-comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach
                    <hr />
              <hr />
                    <h6>Add comment</h6>
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="warning_id" value="{{ $warning->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn-create badge-success" value="Add Comment" />
                        </div>
        </div>
    </div>
     {{Form::close()}}
</div>
