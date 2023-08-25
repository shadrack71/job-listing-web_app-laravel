  @props(['listing'])
  @php
  $tags = $listing ['tags'];
  $Arraytags = explode(',', $tags);

  @endphp



  <ul class="flex">
      @foreach($Arraytags as $tag)
      <li class="flex items-center justify-center bg-black text-white rounded-xl py-3 px-3 mr-2 text-xs">
          <a href="/?tag={{$tag}}">{{$tag}}</a>
      </li>
      @endforeach

  </ul>