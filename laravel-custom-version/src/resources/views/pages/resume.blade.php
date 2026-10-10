@extends('layouts.app')

@section('title', 'Experience & CV | Gian Andrea Sechi')
@section('meta_description', 'My software engineering experience at Musixmatch and Database Informatica, education, courses and downloadable CV.')

@section('content')
<section class="resume-page py-16">
    <div class="max-w-5xl mx-auto px-5 sm:px-8 space-y-12">
        <header class="pb-8 border-b border-slate-800">
            <p class="font-mono text-xs text-indigo-300">experience & CV</p>
            <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">{{ config('profile.name') }}</h1>
            <p class="mt-4 text-lg text-indigo-300">{{ config('profile.role') }}</p>
            <p class="mt-2 text-sm text-slate-400">{{ config('profile.location') }}</p>
            <p class="mt-5 max-w-3xl text-base leading-8 text-slate-400">I’ve worked in software development since 2011, from business applications and web platforms to backend services and data systems. I’m currently at Musixmatch.</p>
            <div class="mt-6 flex flex-wrap gap-5 text-sm">
                <a href="{{ route('resume.download') }}" class="px-5 py-3 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500">Download CV (PDF)</a>
                <a href="{{ config('profile.linkedin') }}" target="_blank" rel="noopener noreferrer" class="py-3 text-indigo-300 hover:text-white">LinkedIn ↗</a>
                <a href="{{ route('about') }}" class="py-3 text-slate-400 hover:text-white">The story behind the CV →</a>
            </div>
        </header>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white">Experience</h2>
            @foreach(config('profile.experience') as $experience)
                <article class="rounded-xl border border-slate-800 bg-slate-900/40 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between gap-3">
                        <div><h3 class="text-xl font-bold text-white">{{ $experience['company'] }}</h3><p class="mt-2 text-sm text-indigo-300">{{ $experience['role'] }}</p></div>
                        <p class="font-mono text-xs text-slate-500">{{ $experience['period'] }}</p>
                    </div>
                    <p class="mt-4 text-xs leading-6 text-slate-500">{{ $experience['progression'] }}</p>
                    <ul class="mt-5 space-y-3 pl-5 list-disc text-sm leading-7 text-slate-300">
                        @foreach($experience['points'] as $point)<li>{{ $point }}</li>@endforeach
                    </ul>
                </article>
            @endforeach
        </section>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white">Areas I work with</h2>
            <div class="grid sm:grid-cols-2 gap-6">
                @foreach(config('profile.skills') as $area => $technologies)
                    <div class="border-t border-slate-800 pt-4"><h3 class="text-sm font-semibold text-indigo-300">{{ $area }}</h3><p class="mt-3 text-sm leading-7 text-slate-400">{{ implode(' · ', $technologies) }}</p></div>
                @endforeach
            </div>
            <p class="text-sm text-slate-500">Italian is my native language. I use English professionally.</p>
        </section>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white">Education</h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <article class="p-6 rounded-xl border border-slate-800 space-y-3">
                    <p class="font-mono text-xs text-slate-500">2009–2011</p>
                    <h3 class="text-lg font-bold text-white">University of Modena and Reggio Emilia</h3>
                    <p class="text-sm leading-7 text-slate-400">Computer Engineering studies. I moved into full-time software development before completing the degree.</p>
                </article>
                <article class="p-6 rounded-xl border border-slate-800 space-y-3">
                    <p class="font-mono text-xs text-slate-500">2004–2009</p>
                    <h3 class="text-lg font-bold text-white">I.T.I.S. Primo Levi</h3>
                    <p class="text-sm leading-7 text-slate-400">Technical secondary-school diploma, specialising in computer science. Graduated with <strong class="text-amber-300">100/100 with honours (100 e lode)</strong>; included in the INDIRE National Register of Excellence.</p>
                </article>
            </div>
            <p class="text-sm leading-7 text-slate-400">My <a href="{{ route('projects.show', 'dynamical-systems-numerical-integration') }}" class="text-indigo-300 hover:text-white">school project on numerical integration</a>, the Vignola mathematics and logic games (2009) and a local poetry competition (2008) are part of that period.</p>
        </section>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white">Courses & continued learning</h2>
            <p class="text-sm leading-7 text-slate-400">My interests include computing, philosophy, psychology and public health. These are online courses and certificates, alongside independent study using the OSSU curriculum.</p>
            <div class="grid sm:grid-cols-2 gap-6">
                @foreach(collect(config('profile.courses'))->groupBy('area') as $area => $courses)
                    <div class="border-t border-slate-800 pt-4">
                        <h3 class="text-sm font-semibold text-indigo-300">{{ $area }}</h3>
                        <ul class="mt-4 space-y-4 text-sm">
                            @foreach($courses as $course)<li><p class="text-slate-200">{{ $course['name'] }}</p><p class="mt-1 text-xs leading-6 text-slate-500">{{ $course['provider'] }}</p></li>@endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <a href="{{ config('profile.linkedin') }}" target="_blank" rel="noopener noreferrer" class="inline-block text-sm text-indigo-300 hover:text-white">Credentials on LinkedIn ↗</a>
        </section>

        @if($projects->isNotEmpty())
        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white">Outside work</h2>
            <div class="divide-y divide-slate-800 border-t border-slate-800">
                @foreach($projects as $project)
                    <a href="{{ route('projects.show', $project->slug) }}" class="block py-5 group"><h3 class="text-base font-semibold text-white group-hover:text-indigo-300">{{ $project->title }}</h3><p class="mt-2 text-sm leading-7 text-slate-400">{{ $project->description }}</p></a>
                @endforeach
            </div>
            <a href="{{ route('projects') }}" class="text-sm text-indigo-300 hover:text-white">All projects →</a>
        </section>
        @endif
    </div>
</section>
@endsection
