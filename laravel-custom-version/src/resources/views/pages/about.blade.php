@extends('layouts.app')

@section('title', 'About Me | Gian Andrea Sechi - Senior Software Engineer')

@section('content')
<section class="about-page py-16">
    <div class="max-w-5xl mx-auto px-5 sm:px-8 space-y-12">
        
        <!-- Header -->
        <div class="pb-8 border-b border-slate-800">
            <p class="font-mono text-xs text-indigo-300">01 / about</p>
            <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                Hi, I’m Gian Andrea Sechi.
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-300 leading-relaxed font-normal">
                Senior Software Engineer & Backend Architect. Logical thinker, lifelong learner, and someone who genuinely loves building things that make a difference.
            </p>
        </div>

        <!-- Story Content Card -->
        <div class="about-story rounded-3xl bg-slate-900/80 border border-slate-800 p-8 sm:p-12 space-y-10 shadow-xl text-slate-300 text-base leading-relaxed">
            
            <!-- Section 1: Intro / Who I Am -->
            <div>
                <p class="font-mono text-xs text-indigo-300">01 / spark</p>
                <h2 class="mt-2 text-xl sm:text-2xl font-bold text-white mb-4">Who I Am & The Spark</h2>
                <div class="space-y-4">
                    <p>
                        I've spent the last <strong class="text-white">14+ years</strong> engineering backend systems, real-time data pipelines, and scalable cloud architectures — but there's a lot more to the story than just server configurations and code repositories.
                    </p>
                    <p>
                        If I had to describe myself in three words, I would say: <strong class="text-indigo-300">logical, deep thinker, and reliable</strong>. Since I was a kid, I’ve had an innate fascination with anything related to technology, mathematics, and science. Ever since I wrote my first lines of code, being a software engineer has felt a bit like having a superpower: the ability to take an idea from scratch and craft powerful, resilient tools that run seamlessly and genuinely improve people's everyday lives.
                    </p>
                </div>
            </div>

            <!-- Section 2: High School & The Intersection of Math & Humanities -->
            <div class="border-t border-slate-800/80 pt-8">
                <p class="font-mono text-xs text-indigo-300">02 / foundations</p>
                <h2 class="mt-2 text-xl sm:text-2xl font-bold text-white mb-4">Logic, Poetry & National Excellence</h2>
                <div class="space-y-4">
                    <p>
                        During high school at <strong>I.T.I.S. Primo Levi</strong> (with a Computer Science specialization), I developed my full nerd personality diving deep into physics, maths, and programming. At the same time, thanks to some truly passionate professors, I discovered a profound love for the human sciences — especially <strong>philosophy and poetry</strong>.
                    </p>
                    <p>
                        That unusual crossover led to a memorable year in 2008–2009: within a few months, I won both the <strong>Town Logic & Math Games</strong> and the <strong>Local Poetry Festival</strong> (celebrated alongside Italian actor and artist Neri Marcorè).
                    </p>
                    
                    <div class="p-5 rounded-lg bg-slate-950/40 border border-slate-800 flex items-start gap-4">
                        <i class="fa-solid fa-award text-amber-400 text-xl mt-1 shrink-0"></i>
                        <div>
                            <h4 class="font-bold text-white text-sm">100/100 Summa Cum Laude & INDIRE National Register of Excellence</h4>
                            <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                                Graduated with highest honors (100/100 con lode), earning an official entry in the <strong>Italian National Register of Excellence (INDIRE)</strong> with the experimental thesis <em>"Continuous Time Dynamical Systems and Numerical Integration Methods"</em>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Professional Journey -->
            <div class="border-t border-slate-800/80 pt-8">
                <p class="font-mono text-xs text-indigo-300">03 / journey</p>
                <h2 class="mt-2 text-xl sm:text-2xl font-bold text-white mb-4">14+ Years in Production: From Monoliths to AWS & Kubernetes</h2>
                <div class="space-y-4">
                    <p>
                        In 2009, I enrolled in Computer Engineering at the <strong>University of Modena and Reggio Emilia</strong>. By 2011, having already mastered much of the coursework through self-study and eager to build real-world software, an exciting job opportunity prompted me to transition directly into production engineering.
                    </p>
                    <p>
                        Over the next decade and a half, I mastered the complete lifecycle of software projects:
                    </p>
                    <ul class="space-y-2.5 text-sm pl-2">
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-emerald-400 mt-1 shrink-0"></i>
                            <span><strong>Database Informatica:</strong> Promoted to Senior & technical reference in 4 years; led Git & REST API adoption, architected multi-million-euro e-invoicing platforms, and built high-traffic real estate portals.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-emerald-400 mt-1 shrink-0"></i>
                            <span><strong>Musixmatch (Senior L5):</strong> Architected real-time AWS streaming pipelines (Kinesis, Firehose, Lambda), led Kubernetes migrations that cut infrastructure costs by up to 90%, and engineered high-throughput tracking services processing billions of records with 99.99% uptime.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Section 4: Social Impact -->
            <div class="border-t border-slate-800/80 pt-8">
                <p class="font-mono text-xs text-indigo-300">04 / impact</p>
                <h2 class="mt-2 text-xl sm:text-2xl font-bold text-white mb-4">Pro-Bono Tech & Social Impact</h2>
                <div class="space-y-4">
                    <p>
                        Technology is at its best when it solves genuine human problems. During the COVID-19 pandemic, I developed two completely free, non-profit open applications:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                        <div class="sm:col-span-2 p-4 rounded-lg bg-slate-950/40 border border-slate-800">
                            <h4 class="font-bold text-white text-sm flex items-center space-x-2 mb-1">
                                <i class="fa-solid fa-diagram-project text-indigo-400"></i>
                                <span>IRIDES</span>
                            </h4>
                            <p class="text-xs text-slate-400">
                                An open-source, asynchronous introspection layer that gives LLMs and AI agents grounded context across multiple databases—helping them understand schemas accurately without hallucinating details.
                                <a href="{{ route('projects.show', 'irides') }}" class="text-indigo-300 hover:text-white">Explore the architecture →</a>
                            </p>
                        </div>
                        <div class="p-4 rounded-lg bg-slate-950/40 border border-slate-800">
                            <h4 class="font-bold text-white text-sm flex items-center space-x-2 mb-1">
                                <i class="fa-solid fa-store text-emerald-400"></i>
                                <span>NearMe</span>
                            </h4>
                            <p class="text-xs text-slate-400">
                                A community directory allowing local shops and services to share updated hours, delivery options, and lockdown info directly with citizens.
                            </p>
                        </div>
                        <div class="p-4 rounded-lg bg-slate-950/40 border border-slate-800">
                            <h4 class="font-bold text-white text-sm flex items-center space-x-2 mb-1">
                                <i class="fa-solid fa-chart-line text-cyan-400"></i>
                                <span>NearMe Data</span>
                            </h4>
                            <p class="text-xs text-slate-400">
                                An open-data dashboard aggregating and visualizing daily epidemiological datasets from the Italian Civil Protection in real-time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5: Beyond the Terminal -->
            <div class="border-t border-slate-800/80 pt-8">
                <p class="font-mono text-xs text-indigo-300">05 / learning</p>
                <h2 class="mt-2 text-xl sm:text-2xl font-bold text-white mb-4">Beyond the Terminal: Lifelong Learning</h2>
                <p>
                    I am an avid self-directed learner. When I step away from code, you'll find me reading about <strong>philosophy, cognitive science, and social psychology</strong>, or exploring advanced computing concepts. I constantly broaden my skill set through <strong>Harvard University (CS50AI, CS50X)</strong>, <strong>Google Professional Certifications</strong>, and the <strong>Open Source Society University (OSSU)</strong> curriculum.
                </p>
            </div>

        </div>

        <!-- Quote -->
        <div class="about-quote p-8 rounded-lg bg-slate-950/40 border border-slate-800 text-left space-y-3">
            <p class="text-lg font-medium text-slate-200 italic leading-relaxed">
                "I work best on problems where scale, reliability, and cost efficiency intersect — turning complex systems into scalable, observable, and resilient software."
            </p>
            <p class="text-xs font-mono text-indigo-300 uppercase tracking-widest">— Gian Andrea Sechi</p>
        </div>

    </div>
</section>
@endsection
