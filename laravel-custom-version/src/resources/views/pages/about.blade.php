@extends('layouts.app')

@section('title', 'About | Gian Andrea Sechi')
@section('meta_description', 'My path through software, mathematics and the humanities: school, work, community projects and the things I keep learning.')

@section('content')
<section class="about-page py-16">
    <div class="max-w-4xl mx-auto px-5 sm:px-8 space-y-12">
        <header class="pb-8 border-b border-slate-800">
            <p class="font-mono text-xs text-indigo-300">about</p>
            <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold text-white tracking-tight">A little more about me.</h1>
            <p class="mt-5 text-base sm:text-lg text-slate-400 leading-8">I’m Gian Andrea, a software engineer based in Italy. This is the longer story behind the projects and the job title.</p>
        </header>

        <div class="about-story space-y-10 text-slate-300 text-base leading-8">
            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white">From an idea to something that works</h2>
                <p>I’ve been interested in technology, mathematics and science since I was a child. Programming gave me a way to do something with that interest: turn an idea into a tool I could actually use.</p>
                <p>That feeling is still a large part of why I enjoy software. Some of the things I build solve a practical problem; others give me a reason to explore a topic or try a different approach.</p>
            </section>

            <section class="border-t border-slate-800 pt-8 space-y-4">
                <h2 class="text-2xl font-bold text-white">Mathematics, philosophy and poetry</h2>
                <p>I studied computer science at <strong class="text-white">I.T.I.S. Primo Levi</strong>. Alongside physics, mathematics and programming, some passionate teachers introduced me to philosophy and poetry. Those interests have stayed with me.</p>
                <p>Two memories I’m particularly fond of are winning a local poetry competition in 2008 and the Vignola mathematics and logic games in 2009. They belong to the same period of my life, even if they usually end up in different sections of a résumé.</p>
                <div class="p-5 rounded-lg bg-slate-950/40 border border-slate-800">
                    <h3 class="font-bold text-amber-300">100/100 with honours — 100 e lode</h3>
                    <p class="mt-2 text-sm leading-7">I graduated in 2009 with the highest mark and honours, and was included in the Italian National Register of Excellence (INDIRE). It is a result I’m still proud of.</p>
                </div>
                <p>My final school project explored the Lorenz system using Euler and Runge–Kutta integration methods. The original Italian write-up and C programs are still available: <a href="{{ route('projects.show', 'dynamical-systems-numerical-integration') }}" class="text-indigo-300 hover:text-white underline underline-offset-4">Dynamical Systems & Numerical Integration</a>.</p>
            </section>

            <section class="border-t border-slate-800 pt-8 space-y-4">
                <h2 class="text-2xl font-bold text-white">Learning through work</h2>
                <p>I enrolled in Computer Engineering at the University of Modena and Reggio Emilia in 2009. In 2011, I took a software development opportunity and moved into full-time work before completing the degree.</p>
                <p>At Database Informatica, I worked on business applications, websites, APIs and systems used by local organisations. Following projects from requirements through development and support gave me experience with the everyday realities of maintaining software.</p>
                <p>I joined Musixmatch in 2022 and now work there as a Senior Software Engineer, focusing on backend systems and data. The problems have changed, but understanding how the pieces fit together is still what interests me.</p>
                <a href="{{ route('resume') }}" class="inline-block text-sm text-indigo-300 hover:text-white">Experience and CV →</a>
            </section>

            <section class="border-t border-slate-800 pt-8 space-y-4">
                <h2 class="text-2xl font-bold text-white">Building close to home</h2>
                <p>During the first COVID-19 lockdowns, I co-founded NearMe with Davide Zaccaria. We wanted to help local shops around Modena communicate opening hours, deliveries and takeaway options through a free directory.</p>
                <p>Later in 2020, I built NearMe Data to make official pandemic data easier to explore. Both projects remain here because they tell a part of my story: using the skills I had to respond to something happening around me.</p>
                <div class="flex flex-wrap gap-5 text-sm text-indigo-300">
                    <a href="{{ route('projects.show', 'near-me') }}" class="hover:text-white">The NearMe story →</a>
                    <a href="{{ route('projects.show', 'near-me-data') }}" class="hover:text-white">NearMe Data →</a>
                </div>
            </section>

            <section class="border-t border-slate-800 pt-8 space-y-4">
                <h2 class="text-2xl font-bold text-white">What I’m exploring now</h2>
                <p>My main open-source project is <a href="{{ route('projects.show', 'irides') }}" class="text-indigo-300 hover:text-white underline underline-offset-4">irides</a>, a tool for exploring database structures and sharing their metadata with applications and AI tools. It brings together my interests in databases, backend systems and developer tooling.</p>
                <p>Outside that work, I read about philosophy, cognitive science and social psychology. My learning has included CS50 courses, Google’s data analytics programme, the OSSU curriculum and courses in philosophy, psychology and public health.</p>
                <p>These are interests I want to give room to here, alongside the software. The <a href="{{ route('blog.index') }}" class="text-indigo-300 hover:text-white underline underline-offset-4">blog</a> is a place for occasional notes on projects, things I’m learning and ideas I want to think through.</p>
            </section>
        </div>
    </div>
</section>
@endsection
