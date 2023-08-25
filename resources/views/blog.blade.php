<div>

    <form method="post" action="{{route('addBlog')}}">
        @method('post')
        @csrf
        <label>title:</label>
        <input type="text" name="title" />

        <label>description:</label>
        <input type="text" name="description" />
        <label>published:</label>
        <input type="radio" name="published" value="1" />
        <input type="radio" name="published" value="0" />
        <input type="submit" name="submit" />

    </form>

</div>