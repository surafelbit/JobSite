<x-layout>
<x-card
                    class=" p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Gig
                        </h2>
                        <p class="mb-4">Post a gig to find a developer</p>
                    </header>

                    <form method="POST" action="/listing" enctype="multipart/form-data">
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
                                value="{{old('company')}}"
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
                                value="{{old('title')}}"

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
                                value="{{old('location')}}"

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
                                    value="{{old('email')}}"

                                />
                            </div>
                            <div>
                                <label for="job_type" class="inline-block text-lg mb-2">Job Type</label>
                                <select name="job_type" class="border border-gray-200 rounded p-2 w-full">
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Remote">Remote</option>
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
                                    value="{{old('website')}}"

                                />
                            </div>
                            <div>
                                <label for="salary" class="inline-block text-lg mb-2">Salary</label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="salary"
                                    placeholder="Example: $120k - $160k"
                                    value="{{old('salary')}}"
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
                                value="{{old('tags')}}"

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
                                value="{{old('description')}}"

                            ></textarea>
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <label class="flex items-center gap-2 text-sm">
                                <input type="checkbox" name="is_featured" value="1" class="rounded border-gray-300" />
                                Feature this opportunity
                            </label>
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create Gig
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </x-card>
            </x-layout>