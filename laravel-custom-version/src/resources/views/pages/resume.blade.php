@extends('layouts.app')

@section('title', 'Curriculum Vitae & Experience | Gian Andrea Sechi')

@section('content')
<section class="resume-page py-16">
    <div class="max-w-6xl mx-auto px-5 sm:px-8 space-y-16">
        
        <!-- Header & Action -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 pb-8 border-b border-slate-800">
            <div>
                <p class="font-mono text-xs text-indigo-300">01 / resume</p>
                <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">Gian Andrea Sechi</h1>
                <p class="font-mono text-sm text-indigo-300 mt-4">Senior Software Engineer & Backend Architect</p>
                <p class="text-slate-400 text-xs mt-2 flex flex-wrap items-center gap-4">
                    <span><i class="fa-solid fa-location-dot mr-1 text-slate-500"></i>Spilamberto (MO), Italy</span>
                    <span><i class="fa-solid fa-envelope mr-1 text-slate-500"></i>me@gianandreasechi.com</span>
                    <span><i class="fa-solid fa-globe mr-1 text-slate-500"></i>www.gianandreasechi.com</span>
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="mailto:me@gianandreasechi.com?subject=Resume%20Inquiry%20from%20Portfolio" class="px-5 py-3 rounded-xl font-bold text-white bg-indigo-600 hover:bg-indigo-500 shadow-lg shadow-indigo-600/30 transition-all flex items-center space-x-2 text-sm">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Contact Direct</span>
                </a>
            </div>
        </div>

        <!-- Professional Summary Card -->
        <div class="resume-summary p-8 rounded-3xl bg-slate-900/80 border border-indigo-800/40 space-y-3 shadow-xl">
            <p class="font-mono text-xs text-indigo-300">02 / profile</p>
            <h2 class="text-2xl font-bold text-white">Executive Summary</h2>
            <p class="text-slate-200 text-base sm:text-lg leading-relaxed font-normal">
                Senior backend engineer with <strong>14+ years of experience</strong> designing data-intensive systems on AWS. At <strong>Musixmatch</strong>, I built the company-wide real-time data platform (millions of records/day), led migrations to Kubernetes-based microservices that cut infrastructure costs by up to 90%, and contributed to an 80% reduction in high-severity vulnerabilities as part of the security squad. I work best on problems where <strong>scale, reliability, and cost efficiency intersect</strong> — turning legacy systems into scalable, observable, production-grade services.
            </p>
        </div>

        <!-- Skills Matrix -->
        <div class="space-y-6">
            <div class="flex items-center space-x-3 text-white">
                <div class="w-10 h-10 rounded-xl bg-indigo-950 border border-indigo-800 flex items-center justify-center text-indigo-400">
                    <i class="fa-solid fa-layer-group text-lg"></i>
                </div>
                <h2 class="text-2xl font-bold">Skills & Technologies</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2.5">
                    <span class="font-bold text-indigo-400 uppercase tracking-wider text-[11px] block">Cloud & Infrastructure</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(['AWS', 'Kubernetes', 'Docker', 'Terraform', 'Kinesis', 'Firehose', 'Lambda', 'S3', 'RDS', 'Redshift', 'Athena', 'CI/CD', 'Azure Pipelines'] as $tech)
                            <span class="tech-badge tech-badge-indigo">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2.5">
                    <span class="font-bold text-cyan-400 uppercase tracking-wider text-[11px] block">Backend</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(['C#', 'ASP.NET', 'PHP', 'Python', 'Node.js', 'Nest.js', 'Laminas Mezzio', 'REST APIs', 'Microservices', 'MVC'] as $tech)
                            <span class="tech-badge tech-badge-cyan">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2.5">
                    <span class="font-bold text-emerald-400 uppercase tracking-wider text-[11px] block">Data & Streaming</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(['MSSQL', 'MySQL', 'Aurora', 'PostgreSQL', 'DynamoDB', 'Memcached', 'Data Pipelines', 'Real-time Streaming'] as $tech)
                            <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2.5">
                    <span class="font-bold text-amber-400 uppercase tracking-wider text-[11px] block">Frontend</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(['JavaScript', 'TypeScript', 'HTML5', 'CSS3', 'Bootstrap', 'jQuery'] as $tech)
                            <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2.5">
                    <span class="font-bold text-purple-400 uppercase tracking-wider text-[11px] block">Tools & Practices</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(['Git', 'Claude Code', 'System Design', 'Security Best Practices', 'Code Review'] as $tech)
                            <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2.5">
                    <span class="font-bold text-rose-400 uppercase tracking-wider text-[11px] block">Languages</span>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="tech-badge">Italian (native)</span>
                        <span class="tech-badge">English (C2 Proficient · EF SET 73/100)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Work Experience Timeline -->
        <div class="space-y-8">
            <div class="flex items-center space-x-3 text-white">
                <div class="w-10 h-10 rounded-xl bg-indigo-950 border border-indigo-800 flex items-center justify-center text-indigo-400">
                    <i class="fa-solid fa-briefcase text-lg"></i>
                </div>
                <h2 class="text-2xl font-bold">Work Experience</h2>
            </div>

            <div class="space-y-8 relative pl-6 border-l-2 border-slate-800">
                
                <!-- Musixmatch -->
                <div class="relative group">
                    <div class="absolute -left-[31px] top-1.5 w-4 h-4 rounded-full bg-indigo-500 ring-4 ring-slate-950"></div>
                    <div class="p-6 sm:p-8 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-indigo-500/50 transition-all space-y-4 shadow-lg">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <div>
                                <h3 class="text-xl sm:text-2xl font-bold text-white">Senior Software Engineer L5</h3>
                                <p class="text-sm font-semibold text-indigo-400">Musixmatch spa</p>
                            </div>
                            <span class="date-tile date-tile-indigo px-3.5 py-1 rounded-full text-xs font-semibold bg-indigo-950 text-indigo-300 border border-indigo-800/60 w-fit">Jun 2022 – Present</span>
                        </div>

                        <div class="promotion-path" aria-label="Career progression at Musixmatch">
                            <div class="promotion-step">
                                <span class="promotion-dot"></span>
                                <p>Senior Software Engineer <span>· L5 · Jan 2026 – Present</span></p>
                            </div>
                            <div class="promotion-step">
                                <span class="promotion-dot"></span>
                                <p>Software Engineer <span>· L4 · Jan 2025 – Jan 2026</span></p>
                            </div>
                            <div class="promotion-step">
                                <span class="promotion-dot"></span>
                                <p>Software Engineer <span>· L3 · Jun 2022 – Jan 2025</span></p>
                            </div>
                        </div>
                        
                        <ul class="space-y-2.5 text-sm text-slate-300 list-disc list-outside pl-4 leading-relaxed">
                            <li><strong>Led development of a company-wide real-time data platform</strong> serving as the single source of truth. Built on AWS (Kinesis, Firehose, Lambda) with REST APIs and CSV export capabilities, the system processed several million records daily with automated normalization. Achieved near real-time updates, improved cross-team data access, and reduced infrastructure and maintenance costs by 50%.</li>
                            <li><strong>On the backend, focused on developing efficient, scalable solutions</strong> for the architecture and software, particularly managing the royalties process, which involves billions of data rows.</li>
                            <li><strong>Successfully migrated several legacy systems to Kubernetes</strong> and a microservices architecture, resulting in a 90% average reduction in costs.</li>
                            <li><strong>Designed a usage tracking system with 99.99% uptime</strong>, capable of handling millions of data records without any migration downtime (based on REST PHP APIs, Firehose, S3).</li>
                            <li><strong>As a part of security squad</strong>, contributed to an 80% reduction in critical and high-severity vulnerabilities through targeted remediation and promotion of security best practices.</li>
                        </ul>

                        <div class="pt-3 space-y-2">
                            <span class="text-xs font-semibold text-slate-400 block">Stack:</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(['PHP', 'Python', 'TypeScript', 'Microservices', 'Kubernetes', 'ActiveMQ', 'KEDA', 'AWS', 'S3', 'Kinesis Data Streams', 'Amazon Data Firehose', 'Athena', 'Argo Workflows', 'MySQL / Aurora', 'Redshift / PostgreSQL', 'DynamoDB', 'AI', 'IaC / IAM', 'Terraform'] as $tech)
                                    <span class="tech-badge tech-badge-indigo">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Database Informatica -->
                <div class="relative group">
                    <div class="absolute -left-[31px] top-1.5 w-4 h-4 rounded-full bg-cyan-500 ring-4 ring-slate-950"></div>
                    <div class="p-6 sm:p-8 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-cyan-500/50 transition-all space-y-4 shadow-lg">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <div>
                                <h3 class="text-xl sm:text-2xl font-bold text-white">Senior Full-Stack Engineer</h3>
                                <p class="text-sm font-semibold text-cyan-400">Database Informatica Srl</p>
                            </div>
                            <span class="date-tile date-tile-cyan px-3.5 py-1 rounded-full text-xs font-semibold bg-cyan-950 text-cyan-300 border border-cyan-800/60 w-fit">Jul 2011 – Jun 2022 (11 Years)</span>
                        </div>

                        <div class="promotion-path" aria-label="Career progression at Database Informatica">
                            <div class="promotion-step">
                                <span class="promotion-dot"></span>
                                <p>Senior Full-Stack Engineer <span>· 2015 – 2022 · technical reference</span></p>
                            </div>
                            <div class="promotion-step">
                                <span class="promotion-dot"></span>
                                <p>Junior Developer → Full-Stack Engineer <span>· 2011 – 2015</span></p>
                            </div>
                        </div>

                        <ul class="space-y-2.5 text-sm text-slate-300 list-disc list-outside pl-4 leading-relaxed">
                            <li><strong>Introduced modern engineering practices</strong> to the team, including the MVC pattern, Bootstrap, a shift from monolithic applications to REST API-driven architectures, and the migration from Visual SourceSafe to Git — raising code quality, maintainability, and collaboration standards across projects.</li>
                            <li><strong>Designed and built a C# e-invoicing automation service</strong> for a national client with multi-million euro revenue, processing thousands of invoices monthly with 99.9% accuracy. Full lifecycle automation including PDF generation, base64 embedding, and p7m digital signing.</li>
                            <li><strong>Led development of a map-based search platform</strong> aggregating 100,000+ business listings, integrated with Google Maps API and a custom back-office system (C#, HTML5, jQuery, MSSQL).</li>
                            <li><strong>Delivered digital payment systems</strong> for municipalities and trade associations in the Modena district, handling citizen-facing transactions for public services.</li>
                            <li><strong>Built and maintained institutional websites and full invoicing management systems</strong> for SMEs, serving as the primary technical owner end-to-end — from requirements gathering to deployment and support.</li>
                            <li><strong>Designed REST APIs</strong> to expose internal system data to external partners and applications, reducing manual operations by 80%.</li>
                            <li><strong>Implemented a barcode-based activity tracking system</strong> (generation and reading) with MSSQL persistence, increasing operational efficiency by 70%.</li>
                        </ul>

                        <div class="pt-3 space-y-2">
                            <span class="text-xs font-semibold text-slate-400 block">Stack:</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(['C#', 'ASP.NET', 'MSSQL', 'PHP', 'MySQL', 'JavaScript', 'jQuery', 'HTML5', 'Bootstrap'] as $tech)
                                    <span class="tech-badge tech-badge-cyan">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Education -->
        <div class="space-y-8">
            <div class="flex items-center space-x-3 text-white">
                <div class="w-10 h-10 rounded-xl bg-cyan-950 border border-cyan-800 flex items-center justify-center text-cyan-400">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <h2 class="text-2xl font-bold">Education</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Harvard -->
                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-white text-base">Harvard School of Engineering</h3>
                        <span class="text-[11px] text-indigo-400 font-mono">Nov 2020 – Feb 2021</span>
                    </div>
                    <p class="text-xs font-semibold text-cyan-300">CS50AI & CS50X</p>
                    <p class="text-xs text-slate-400 leading-relaxed">Introduction to Computer Science & Artificial Intelligence and Machine Learning with Python (Online MOOC on edX).</p>
                </div>

                <!-- UniMoRe -->
                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-white text-base">Modena & Reggio Emilia University</h3>
                        <span class="text-[11px] text-indigo-400 font-mono">Sep 2009 – Jun 2011</span>
                    </div>
                    <p class="text-xs font-semibold text-slate-300">B.Sc. in Computer Science</p>
                    <p class="text-xs text-slate-400 leading-relaxed">Enrolled 2009–2011 (transitioned to full-time engineering). Completed courses: Algorithms I & II, Mathematical Analysis I, English, Statistics I.</p>
                </div>

                <!-- ITI Levi -->
                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-white text-base">I.T.I.S Primo Levi</h3>
                        <span class="text-[11px] text-indigo-400 font-mono">Sep 2004 – Jun 2009</span>
                    </div>
                    <p class="text-xs font-semibold text-amber-300">High School - IT Engineer</p>
                    <p class="text-xs text-slate-400 leading-relaxed">Diploma 100/100 Summa Cum Laude. Listed in the INDIRE National Register of Excellence.</p>
                </div>
            </div>
        </div>

        <!-- Additional Information / Certifications & Awards -->
        <div class="space-y-8">
            <div class="flex items-center space-x-3 text-white">
                <div class="w-10 h-10 rounded-xl bg-amber-950 border border-amber-800 flex items-center justify-center text-amber-400">
                    <i class="fa-solid fa-certificate text-lg"></i>
                </div>
                <h2 class="text-2xl font-bold">Certifications & Awards</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tech Certifications -->
                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                    <h3 class="text-sm font-bold text-indigo-400 uppercase tracking-wider flex items-center space-x-2">
                        <i class="fa-solid fa-microchip"></i>
                        <span>Technical Certifications</span>
                    </h3>
                    <ul class="space-y-2.5 text-xs text-slate-300">
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-emerald-400 mt-0.5"></i>
                            <div><strong>Data Analytics Professional Certificate</strong> – Google (2021)</div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-emerald-400 mt-0.5"></i>
                            <div><strong>Machine Learning for Business Professionals</strong> – Google (Coursera)</div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-emerald-400 mt-0.5"></i>
                            <div><strong>Data Science Math Skills</strong> – Duke University (Coursera)</div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-emerald-400 mt-0.5"></i>
                            <div><strong>CS50AI & CS50X</strong> – Harvard University & edX</div>
                        </li>
                    </ul>
                </div>

                <!-- Arts & Human Sciences -->
                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                    <h3 class="text-sm font-bold text-purple-400 uppercase tracking-wider flex items-center space-x-2">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Arts & Human Sciences</span>
                    </h3>
                    <ul class="space-y-2.5 text-xs text-slate-300">
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-purple-400 mt-0.5"></i>
                            <div><strong>Essentials of Global Health</strong> – Yale University</div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-purple-400 mt-0.5"></i>
                            <div><strong>Psychological First Aid</strong> – Johns Hopkins University</div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-purple-400 mt-0.5"></i>
                            <div><strong>Introduction to Philosophy</strong> – The University of Edinburgh</div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fa-solid fa-check text-purple-400 mt-0.5"></i>
                            <div><strong>Social Psychology (with Honors)</strong> – Wesleyan University</div>
                        </li>
                    </ul>
                </div>

                <!-- Awards & Activities -->
                <div class="md:col-span-2 p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                    <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider flex items-center space-x-2">
                        <i class="fa-solid fa-trophy"></i>
                        <span>Awards & Recognition</span>
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs text-slate-300">
                        <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-1">
                            <strong class="text-white block">Winner of Vignola Math & Logic Games 2009</strong>
                            <p class="text-slate-400">Awarded 1st place in logic and mathematics competitions at I.T.I. Primo Levi.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-1">
                            <strong class="text-white block">Winner of Poetry Festival 2008</strong>
                            <p class="text-slate-400">Awarded for literary verse with the jury presence of artist Neri Marcorè.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-1">
                            <strong class="text-white block">INDIRE National Register of Excellence</strong>
                            <p class="text-slate-400">Inducted for graduating 100/100 Summa Cum Laude with honors.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-1">
                            <strong class="text-white block">Personal Publication & Media Mention</strong>
                            <p class="text-slate-400">"Continuous Time Dynamical System and Numeric Integration Methods"; featured in ModenaToday.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Projects Section (From CV) -->
        <div class="space-y-6">
            <div class="flex items-center space-x-3 text-white">
                <div class="w-10 h-10 rounded-xl bg-emerald-950 border border-emerald-800 flex items-center justify-center text-emerald-400">
                    <i class="fa-solid fa-rocket text-lg"></i>
                </div>
                <h2 class="text-2xl font-bold">Personal Projects & Initiatives</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-3 p-6 rounded-2xl bg-slate-900/80 border border-indigo-800/60 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                        <div>
                            <p class="font-mono text-xs text-indigo-300">Flagship open-source project · 2026 – Present</p>
                            <h4 class="mt-2 font-bold text-white text-xl">IRIDES</h4>
                            <p class="mt-1 text-sm text-indigo-300">Unified Multi-Database Introspection Layer for LLMs & AI Agents</p>
                        </div>
                        <a href="{{ route('projects.show', 'irides') }}" class="shrink-0 text-xs font-bold text-indigo-300 hover:text-white flex items-center space-x-1">
                            <span>Explore architecture</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                    <p class="max-w-4xl text-sm text-slate-300 leading-relaxed">A structured, asynchronous platform that gives AI applications grounded schema context across heterogeneous data stores. It combines FastAPI and FastMCP interfaces with Redis Streams-based scanning, normalized database introspection and optional semantic documentation—helping agents produce accurate database-aware answers without hallucinating schema details.</p>
                    <p class="font-mono text-[11px] text-slate-500">Python 3.11 · FastAPI · FastMCP · Redis Streams · Pydantic · LiteLLM · Docker · PostgreSQL · MySQL · Athena · DynamoDB</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-bold text-indigo-400">Developer Platform</span>
                            <span class="text-slate-500 font-mono">Mar 2021 – Present</span>
                        </div>
                        <h4 class="font-bold text-white text-base">gianandreasechi.com</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">Full-stack developer portfolio and technical blog built from scratch using PHP, MySQL, Bootstrap, jQuery/Ajax, and modernized with Laravel 12.</p>
                    </div>
                    <a href="https://www.gianandreasechi.com" target="_blank" class="text-xs font-bold text-indigo-400 hover:text-white flex items-center space-x-1">
                        <span>Visit Site</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-bold text-emerald-400">Community Project</span>
                            <span class="text-slate-500 font-mono">May 2020 – May 2021</span>
                        </div>
                        <h4 class="font-bold text-white text-base">Near-me</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">Non-profit website providing visibility to local merchants in Modena during COVID-19 lockdowns for takeaway, deliveries, and hours.</p>
                    </div>
                    <a href="{{ route('projects.show', 'near-me') }}" target="_blank" class="text-xs font-bold text-emerald-400 hover:text-white flex items-center space-x-1">
                        <span>Learn More</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-bold text-cyan-400">Open Data Dashboard</span>
                            <span class="text-slate-500 font-mono">May 2020 – May 2022</span>
                        </div>
                        <h4 class="font-bold text-white text-base">Near-me Data</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">Interactive COVID-19 pandemic and vaccination dashboard ingesting open data from the official Italian Civil Protection GitHub repo.</p>
                    </div>
                    <a href="{{ route('projects.near-me-data.live') }}" target="_blank" class="text-xs font-bold text-cyan-400 hover:text-white flex items-center space-x-1">
                        <span>View Live App</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
