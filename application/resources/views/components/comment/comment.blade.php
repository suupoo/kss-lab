<li class="list-group-item">
    <a href="{{route('account.show',['public_id'=>$user->first()->public_id])}}">{{$user->first()->name}}</a>
    <hr />
    <span id="comment-comment" >{{$comment->comment}}</span>
</li>