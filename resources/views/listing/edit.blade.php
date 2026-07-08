<x-layout>
    <x-card class=" p-10 rounded max-w-lg mx-auto mt-24">
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit a Gig
                            </h2>
                            <p class="mb-4">Edit {{$listing->title}} to find a developer</p>
                        </header>
    
                        <form method="POST" action="/listing/{{ $listing->id }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                           
                            <div class="mb-6">
                                <label
                                    for="company"
                                    class="inline-block text-lg mb-2"
                                    >Company Name</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="company"
                                    value="{{$listing->company}}"
                                />
                            </div>
    
                            <div class="mb-6">
                                <label for="title" class="inline-block text-lg mb-2"
                                    >Job Title</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="title"
                                    placeholder="Example: Senior Laravel Developer"
                                    value="{{$listing->title}}"
    
                                />
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="location"
                                    class="inline-block text-lg mb-2"
                                    >Job Location</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="location"
                                    placeholder="Example: Remote, Boston MA, etc"
                                    value="{{$listing->location}}"
    
                                />
                            </div>
    
                            <div class="mb-6 grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="email" class="inline-block text-lg mb-2"
                                        >Contact Email</label
                                    >
                                    <input
                                        type="text"
                                        class="border border-gray-200 rounded p-2 w-full"
                                        name="email"
                                        value="{{$listing->email}}"
        
                                    />
                                </div>
                                <div>
                                    <label for="job_type" class="inline-block text-lg mb-2">Job Type</label>
                                    <select name="job_type" class="border border-gray-200 rounded p-2 w-full">
                                        <option value="Full-time" {{ $listing->job_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                        <option value="Part-time" {{ $listing->job_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                        <option value="Contract" {{ $listing->job_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="Remote" {{ $listing->job_type == 'Remote' ? 'selected' : '' }}>Remote</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="mb-6 grid md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        for="website"
                                        class="inline-block text-lg mb-2"
                                    >
                                        Website/Application URL
                                    </label>
                                    <input
                                        type="text"
                                        class="border border-gray-200 rounded p-2 w-full"
                                        name="website"
                                        value="{{$listing->website}}"
        
                                    />
                                </div>
                                <div>
                                    <label for="salary" class="inline-block text-lg mb-2">Salary</label>
                                    <input
                                        type="text"
                                        class="border border-gray-200 rounded p-2 w-full"
                                        name="salary"
                                        value="{{$listing->salary}}"
                                    />
                                </div>
                            </div>
    
                            <div class="mb-6">
                                <label for="tags" class="inline-block text-lg mb-2">
                                    Tags (Comma Separated)
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="tags"
                                    placeholder="Example: Laravel, Backend, Postgres, etc"
                                    value="{{$listing->tags}}"
    
                                />
                            </div>
    
                            <div class="mb-6">
                                <label for="logo" class="inline-block text-lg mb-2">
                                    Company Logo
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="logo"
                                />
                                <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo?asset("storage/".$listing->logo):asset("/images/no-image.png")}}"
            alt=""
        />
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="description"
                                    class="inline-block text-lg mb-2"
                                >
                                    Job Description
                                </label>
                                <textarea
    class="border border-gray-200 rounded p-2 w-full"
    name="description"
    rows="10"
    placeholder="Include tasks, requirements, salary, etc"
>{{ $listing->description }}</textarea>
                            </div>
    
                            <div class="mb-6 flex items-center justify-between">
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="checkbox" name="is_featured" value="1" class="rounded border-gray-300" {{ $listing->is_featured ? 'checked' : '' }} />
                                    Feature this opportunity
                                </label>
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    Edit Gig
                                </button>
    
                                <a href="/" class="text-black ml-4"> Back </a>
                            </div>
                        </form>
                    </x-card>
                </x-layout>