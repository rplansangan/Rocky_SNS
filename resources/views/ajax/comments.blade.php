<li class="media">
    <div class="media-left">
      <a href="#">
        <img class="media-object"  width="64px" height="64px" src="{{ URL::asset('assets/images/jon.jpg') }}" alt="...">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h4>
      {{ $comment->comment_message }}
    </div>
  </li>
