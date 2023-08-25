<div>
    <form method="post" action="{{route('updateBlog',['blog'=>$blog])}}">
        @method('put')
        @csrf
        <label>title:</label>
        <input type="text" name="title" value="{{$blog->title}}" />
        <label>description:</label>
        <input type="text" name="description" value="{{$blog->description}}" />
        <label>published:</label>
        <input type="radio" name="published" value="1" />
        <input type="radio" name="published" value="0" />
        <input type="submit" name="submit" />

    </form>

</div>