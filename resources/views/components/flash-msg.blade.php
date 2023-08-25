@if(session()->has('msg'))
<div class=" left-1/2 transform -translate-x-1/2 bg-laravel text-black px-48 py-3">
    <p>
        {{session('msg')}}
    </p>
</div>
@endif