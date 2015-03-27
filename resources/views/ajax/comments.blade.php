<li class="media">
    <div class="media-left">
      <a href="{{ route('profile.showProfile', $comment->user->registration_id) }}">
        <img class="media-object"  width="30px" height="30px" src="{{ URL::asset('assets/images/jon.jpg') }}" alt="...">
      </a>
    </div>
    <div class="media-body com-name">
      <a href="{{ route('profile.showProfile', $comment->user->registration_id) }}">
      	<span class="media-heading">{{ $comment->user->first_name }} {{ $comment->user->last_name }} </span>
      </a>
      {{ $comment->comment_message }}
    </div>
  </li>
