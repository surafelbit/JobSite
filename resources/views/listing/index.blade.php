<x-layout>
@include('partials._hero')
@include('partials._search')

@if($featuredListings->isNotEmpty())
<section class="mb-8 rounded-3xl border border-amber-200 bg-amber-50 p-6 shadow-sm">
    <div class="mb-4 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-gray-900">Featured Opportunities</h2>
            <p class="text-sm text-gray-600">Hand-picked listings that stand out.</p>
        </div>
    </div>
    <div class="grid gap-4 lg:grid-cols-3">
        @foreach($featuredListings as $listing)
            <a href="/listing/{{ $listing->id }}" class="rounded-2xl border border-amber-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <h3 class="font-semibold text-gray-900">{{ $listing->title }}</h3>
                    <span class="text-xs font-semibold uppercase text-amber-700">Featured</span>
                </div>
                <p class="mt-2 text-sm text-gray-600">{{ $listing->company }}</p>
                <p class="mt-2 text-sm text-gray-500">{{ $listing->location }}</p>
            </a>
        @endforeach
    </div>
</section>
@endif

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0">
    @unless (count($lists)==0)
        @foreach($lists as $listings)
            <x-listing-card :listings="$listings"/>
        @endforeach
    @else
        <p class="rounded-2xl border border-gray-200 bg-white p-6 text-gray-600">No listings found yet.</p>
    @endunless
</div>
<div class="mt-6 p-4">
    {{$lists->links()}}
</div>
</x-layout>