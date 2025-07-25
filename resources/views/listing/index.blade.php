<x-layout>
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >@unless (count($lists)==0)
@foreach($lists as $listings)
 
<x-listing-card :listings="$listings"/>
    @endforeach
@else  
<p>No listings</p>

@endunless
</div>
<div class="mt-6 p-4">
    {{$lists->links()}}
</div>
{{-- @if(count($lists)==0) --}}
{{-- @endif --}}
</x-layout>