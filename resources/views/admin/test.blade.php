@php
$users = $user_data_Listings['user_data'];
$listings = $user_data_Listings['user_listings'];

@endphp
<h2>


    {{ $users -> name}}
</h2>

@foreach ($listings as $userListing)
<p>

    {{$userListing -> title}}
</p>

@endforeach