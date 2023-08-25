<div>
    <div>
        @if(session()->has('msg'))

        <p>{{session('msg')}}</p>

        @endif
        <table @style="border:1">
            <thead>
                <tr>
                    <th>
                        title
                    </th>
                    <th>
                        description
                    </th>
                    <th>
                        published
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td> {{$blog -> title}}</td>
                    <td>{{$blog -> description}}</td>
                    <td>{{$blog -> published}}</td>
                    <td>

                        <button><a href="{{route('updateBlogView',['blog'=>$blog])}}">edit</a></button>
                    </td>
                    <td>
                        <form method="post" action="{{route('deleteBlog',['blog'=>$blog])}}">
                            @method("delete")
                            @csrf
                            <button type="submit"> delete</button>

                        </form>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        <button><a href="{{route('blog')}}">add blog</a></button>

    </div>

</div>