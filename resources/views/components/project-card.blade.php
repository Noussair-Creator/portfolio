@props(['project'])

<div
    class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
    <a href="{{ $project->project_url ?? '#' }}" target="_blank">
        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}"
            class="w-full h-48 object-cover">
    </a>
    <div class="p-6">
        <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($project->tags as $tag)
                <span
                    class="bg-gray-200 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $tag->name }}</span>
            @endforeach
        </div>
        <p class="text-gray-600 mb-4">{{ $project->description }}</p>
        <div class="flex justify-start space-x-4">
            @if ($project->project_url)
                <a href="{{ $project->project_url }}" target="_blank" class="text-blue-500 hover:underline">View
                    Project</a>
            @endif
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" class="text-blue-500 hover:underline">GitHub Repo</a>
            @endif
        </div>
    </div>
</div>
