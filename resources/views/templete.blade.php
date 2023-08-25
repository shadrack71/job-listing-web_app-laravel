<!-- <x-alert /> -->

@foreach ($listings as $listing)
<h4>This is listing Id {{ $listing['id'] }}</h4>
<p>{{ $listing['title'] }}</p>
<p>{{ $listing['description '] }}</p>
@endforeach