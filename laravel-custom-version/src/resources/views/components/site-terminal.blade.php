@props(['projects', 'posts'])

<section data-site-terminal hidden class="max-w-6xl mx-auto px-5 sm:px-8 pt-14 sm:pt-16" aria-labelledby="terminal-heading">
    <div class="mb-5 sm:flex sm:items-baseline sm:justify-between gap-4">
        <h2 id="terminal-heading" class="text-xl font-bold text-white">Prefer the terminal?</h2>
        <p class="mt-2 sm:mt-0 text-sm text-slate-400">A few commands to explore this site.</p>
    </div>
    <div class="overflow-hidden rounded-lg border border-slate-800 bg-slate-950/60 font-mono text-sm">
        <div class="flex items-center gap-2 border-b border-slate-800 px-4 py-3 text-xs text-slate-400">
            <span aria-hidden="true" class="text-indigo-300">&gt;_</span>
            <span>gianandrea@website: ~</span>
        </div>
        <div data-terminal-output role="log" aria-label="Terminal output" aria-live="polite" aria-relevant="additions" tabindex="0" class="h-64 overflow-y-auto p-4 sm:p-5 space-y-4 break-words text-slate-300 focus-visible:outline-2 focus-visible:outline-indigo-300">
            <p class="text-slate-400">Welcome. Type <span class="text-indigo-300">help</span> to get started.</p>
        </div>
        <form data-terminal-form class="flex items-center gap-3 border-t border-slate-800 px-4 py-3 sm:px-5">
            <span aria-hidden="true" class="text-indigo-300">$</span>
            <label for="terminal-command" class="sr-only">Terminal command</label>
            <input id="terminal-command" data-terminal-input type="text" maxlength="120" autocomplete="off" autocapitalize="none" spellcheck="false" aria-describedby="terminal-hint" class="min-w-0 flex-1 bg-transparent text-base sm:text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none" placeholder="Type a command…">
            <button type="submit" class="rounded border border-slate-700 px-3 py-1 text-xs text-indigo-300 hover:border-indigo-300 focus-visible:outline-2 focus-visible:outline-indigo-300">Run</button>
        </form>
    </div>
    <div class="mt-3 flex flex-wrap items-center gap-2">
        <span id="terminal-hint" class="mr-1 text-xs text-slate-400">Try:</span>
        @foreach(['help', 'whoami', 'projects', 'blog', 'experience', 'contact', 'clear'] as $command)
            <button type="button" data-terminal-command="{{ $command }}" class="rounded border border-slate-800 px-3 py-2 font-mono text-xs text-slate-400 hover:text-indigo-300 hover:border-indigo-300 focus-visible:outline-2 focus-visible:outline-indigo-300">{{ $command }}</button>
        @endforeach
    </div>

    <template data-terminal-response="help">
        <dl class="grid grid-cols-[auto_1fr] gap-x-5 gap-y-2">
            @foreach(['help' => 'Show available commands', 'whoami' => 'Meet the person behind this site', 'projects' => 'Explore selected projects', 'blog' => 'Read the latest posts', 'experience' => 'Read my career summary', 'contact' => 'Find email and social profiles', 'clear' => 'Clear the terminal'] as $command => $description)
                <dt class="text-indigo-300">{{ $command }}</dt><dd>{{ $description }}</dd>
            @endforeach
        </dl>
        <p class="mt-3 text-xs text-slate-400">Use ↑ / ↓ for command history and Tab to complete a command.</p>
    </template>
    <template data-terminal-response="whoami">
        <p>{{ config('profile.name') }}<br>{{ config('profile.role') }} at {{ config('profile.company') }}<br>{{ config('profile.location') }}</p>
        <a href="{{ route('about') }}" class="mt-3 inline-block text-indigo-300 hover:underline">Read my story →</a>
    </template>
    <template data-terminal-response="projects">
        <ul class="space-y-3">
            @forelse($projects as $project)
                <li><a href="{{ route('projects.show', $project->slug) }}" class="text-indigo-300 hover:underline">{{ $project->title }} →</a><p class="mt-1 text-xs leading-6 text-slate-400">{{ $project->description }}</p></li>
            @empty
                <li>Project stories are on their way.</li>
            @endforelse
        </ul>
        <a href="{{ route('projects') }}" class="mt-3 inline-block text-indigo-300 hover:underline">All projects →</a>
    </template>
    <template data-terminal-response="blog">
        <ul class="space-y-3">
            @forelse($posts as $post)
                <li>
                    <time datetime="{{ $post->published_at->toDateString() }}" class="block text-xs text-slate-400">{{ $post->published_at->format('M j, Y') }}</time>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-indigo-300 hover:underline">{{ $post->title }} →</a>
                </li>
            @empty
                <li>No posts published yet. Check back soon.</li>
            @endforelse
        </ul>
        <a href="{{ route('blog.index') }}" class="mt-3 inline-block text-indigo-300 hover:underline">Browse all posts →</a>
    </template>
    <template data-terminal-response="experience">
        <ul class="space-y-3">
            @foreach(config('profile.experience') as $experience)
                <li><p>{{ $experience['company'] }} · {{ $experience['period'] }}</p><p class="text-slate-400">{{ $experience['role'] }}</p></li>
            @endforeach
        </ul>
        <a href="{{ route('resume') }}" class="mt-3 inline-block text-indigo-300 hover:underline">Experience & CV →</a>
    </template>
    <template data-terminal-response="contact">
        <ul class="space-y-2">
            <li><a href="mailto:{{ config('profile.email') }}" class="text-indigo-300 hover:underline">{{ config('profile.email') }}</a></li>
            <li><a href="{{ config('profile.github') }}" class="text-indigo-300 hover:underline">GitHub →</a></li>
            <li><a href="{{ config('profile.linkedin') }}" class="text-indigo-300 hover:underline">LinkedIn →</a></li>
        </ul>
    </template>
</section>
