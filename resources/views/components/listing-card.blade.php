@props(['listings'])
<x-card>
    <div class="flex flex-col md:flex-row gap-5">
        <div class="flex-shrink-0">
            <img
                class="w-24 h-24 rounded-xl object-cover border border-gray-200"
                src="{{$listings->logo?asset("storage/".$listings->logo):asset("/images/no-image.png")}}"
                alt=""
            />
        </div>
        <div class="flex-1">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">
                        <a href="/listing/{{$listings->id}}" class="hover:text-laravel">{{$listings->title}}</a>
                    </h3>
                    <div class="text-lg font-bold text-gray-700 mt-1">{{$listings->company}}</div>
                </div>
                @if($listings->is_featured)
                    <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1 rounded-full">Featured</span>
                @endif
            </div>
            <div class="flex flex-wrap gap-2 mt-3 text-sm text-gray-600">
                <span class="bg-gray-100 px-3 py-1 rounded-full"><i class="fa-solid fa-location-dot"></i> {{$listings->location}}</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full"><i class="fa-solid fa-briefcase"></i> {{$listings->job_type ?? 'Full-time'}}</span>
                @if($listings->salary)
                    <span class="bg-gray-100 px-3 py-1 rounded-full"><i class="fa-solid fa-money-bill-wave"></i> {{$listings->salary}}</span>
                @endif
            </div>
            <div class="mt-4">
                <x-listing-tags :tagsCsv="$listings->tags" />
            </div>
        </div>
    </div>
</x-card>
