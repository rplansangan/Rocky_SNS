<li class="media">
    <div class="media-left">
      <a href="{{ route('profile.showProfile', $comment->user->registration_id) }}">
        <img class="media-object"  width="30px" height="30px" src="{{ URL::asset('assets/images/jon.jpg') }}" alt="...">
      </a>
    </div>
    <div class="media-body com-name">
      <a href="{{ route('profile.showProfile', $comment->user->registration_id) }}">
      	<small>{{ $comment->user->first_name }} {{ $comment->user->last_name }} </small>
      </a>
     <p> {{ $comment->comment_message }}</p>
    </div>
    @if($comment->comment_user_id == Auth::id())
      <button type="button" class="close comment-remove" data-label="remove" value=" {{ $comment->comment_id }} "><span>&times;</span></button>
    @endif
  </li>
