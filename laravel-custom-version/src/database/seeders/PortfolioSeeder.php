<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories
        $backendCategory = Category::create([
            'name' => 'Backend & Cloud Architecture',
            'slug' => 'backend-cloud-architecture',
            'description' => 'Real-time data platforms, AWS, Kubernetes microservices, FaaS, and high-throughput systems.',
            'color' => '#6366f1',
        ]);

        $aiCategory = Category::create([
            'name' => 'AI & Data Engineering',
            'slug' => 'ai-data-engineering',
            'description' => 'Machine learning, LLM context providers, database introspection, and MCP servers.',
            'color' => '#06b6d4',
        ]);

        $openSourceCategory = Category::create([
            'name' => 'Open Source & Impact',
            'slug' => 'open-source-impact',
            'description' => 'No-profit initiatives, open data integrations, and developer utility libraries.',
            'color' => '#10b981',
        ]);

        $philosophyCategory = Category::create([
            'name' => 'Engineering Thoughts',
            'slug' => 'engineering-thoughts',
            'description' => 'Reflections on system design, clean architecture, continuous learning, and human sciences.',
            'color' => '#f59e0b',
        ]);

        // 2. Projects
        
        // TOP FLAGSHIP PROJECT: IRIDES (Multi databases describer library with dedicated api, mcp and worker)
        Project::create([
            'title' => 'IRIDES',
            'slug' => 'irides',
            'subtitle' => 'Unified Multi-Database Introspection Layer with REST API, FastMCP Server & Async Redis Worker for LLMs',
            'description' => 'A unified, asynchronous database introspection layer designed to help LLMs and AI agents extract, summarize, and understand schemas across heterogeneous SQL, NoSQL, and Cloud Analytics data stores without hallucinating.',
            'content' => <<<MARKDOWN
# IRIDES: Unified Database Introspection for LLMs & AI Agents

**IRIDES** (`v0.4.0-alpha`) is an asynchronous database introspection layer engineered to provide accurate, low-overhead schema context to Large Language Models (LLMs) and AI agents across heterogeneous data stores.

---

### The Problem it Solves
When building AI agents or data tools across multiple databases, a primary challenge is providing accurate, low-overhead schema context. Without proper grounding, LLMs frequently hallucinate column names, infer non-existent relationships, or generate invalid SQL/NoSQL queries.

`irides` acts as a **context provider layer** that:
- Introspects diverse SQL, NoSQL, and cloud analytics databases.
- Normalizes schemas, tables, columns, indexes, and primary/foreign keys into structured Pydantic models.
- Provides a versioned REST API (`/api/v1`), Model Context Protocol (**FastMCP**) endpoints, and asynchronous table scanning via **Redis Streams**.
- Generates semantic table documentation via **LiteLLM** stored separately from raw schema metadata.
- Optimizes payload size for LLMs using lightweight serialization (**TOON** format).
- Persists introspected metadata (with human annotations) in a **Metadata Store** backed by JSON files, S3, or Athena.

---

### System Architecture

The system is split into decoupled microservices connected via Docker networks and Redis Streams:

```
┌─────────────────────┐     ┌──────────────────────┐
│   MCP Client / LLM  │     │  Browser (Web UI /ui) │
└──────────┬──────────┘     └──────────┬────────────┘
           │ HTTP / TOON               │ HTTP
           ▼                           ▼
    ┌─────────────┐       ┌────────────────────────────────┐
    │  MCP Server │──────►│           FastAPI               │
    └─────────────┘ HTTP  │  REST API (/api/v1)             │
                          │  Metadata API (/api/v1/metadata)│
                          └────────┬───────────┬────────────┘
                                   │           │ read/write
                                   ▼           ▼
                          ┌──────────────┐  ┌──────────────────────┐
                          │ Redis Stream │  │   Metadata Store      │
                          │ (scan:queue) │  │ (JSON / S3 / Athena)  │
                          └──────┬───────┘  └──────────────────────┘
                                 │                    ▲
                                 ▼                    │ write
                          ┌─────────────┐             │
                          │   Worker    │─────────────┘
                          │  (Consumer) │
                          └──────┬──────┘
                                 │
                          ┌──────┴──────┐
                                 │
                       ┌─────────┴──────────┐
                       │    Core Library     │
                       └────────────────────┘
                                 │
           ┌─────────────────────┼──────────────────────┐
           ▼                     ▼                      ▼
    ┌──────────────┐   ┌──────────────────┐   ┌──────────────┐
    │ MySQL / PG   │   │ Dynamo / Mongo   │   │ Athena/Trino │
    └──────────────┘   └──────────────────┘   └──────────────┘
```

### Modular Components
- **`core/`**: Shared Python library providing connector abstractions, Pydantic models, caching, config loaders, and Redis `JobStore`.
- **`cli/`**: Standalone Command-line client built on `core` for direct synchronous introspection without running the API service.
- **`infra/`**: Shared Redis container and `irides-net` Docker network.
- **`api/`**: FastAPI web service exposing the versioned REST API (`/api/v1`), Metadata API, and Web UI.
- **`worker/`**: Async task consumer executing background scans over Redis Streams (`scan:queue`) and writing results to the Metadata Store.
- **`mcp/`**: FastMCP server exposing introspection tools directly to AI assistants (Claude, ChatGPT, IDE agents).

---

### Supported Database Engines
- **Relational SQL**: PostgreSQL, MySQL
- **NoSQL & Document**: DynamoDB, MongoDB
- **Cloud Analytics & Lakehouses**: Amazon Athena, Trino
MARKDOWN,
            'category' => 'Flagship Architecture',
            'tech_stack' => ['Python 3.11', 'FastAPI', 'FastMCP', 'Redis Streams', 'Pydantic', 'LiteLLM', 'Docker', 'PostgreSQL/MySQL', 'Athena/DynamoDB'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi/irides',
            'image_url' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        // Near-me
        Project::create([
            'title' => 'Near-me',
            'slug' => 'near-me',
            'subtitle' => 'Digital Visibility & Service Directory for Local Businesses',
            'description' => 'A non-profit community platform developed during COVID-19 lockdowns to give small local merchants in the Modena district an instant digital showcase for adjusted operations (delivery, takeaway, and opening hours).',
            'content' => <<<MARKDOWN
# Near-me: Community Emergency Showcase

During the initial 2020 COVID-19 lockdowns in Italy, small neighborhood stores and independent businesses faced sudden closures without digital channels to communicate with local residents.

### Problem & Solution
- **The Challenge**: Local merchants lacked websites or technical expertise to publish delivery schedules, safety protocols, and ordering options.
- **The Platform**: **Near-me** was engineered as a 100% free, non-profit web application where business owners could create a verified profile in under 2 minutes.
- **Key Capabilities**:
  - Search businesses by district, category, and operating mode (Takeaway, Home Delivery, Video Consultation).
  - Real-time opening hour status indicators.
  - Direct customer contact via WhatsApp, phone, and email without middleman fees.

### Technical Implementation
- **Backend**: PHP MVC architecture with MySQL persistence.
- **Frontend**: Responsive UI built with Bootstrap, HTML5, CSS3, and AJAX live search.
- **Security & Privacy**: GDPR compliant data storage with automated account verification.
MARKDOWN,
            'category' => 'Personal Project',
            'tech_stack' => ['PHP', 'MySQL', 'Bootstrap', 'HTML5', 'jQuery', 'CSS3'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi',
            'image_url' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=800&q=80',
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        // Near-me Data
        Project::create([
            'title' => 'Near-me Data',
            'slug' => 'near-me-data',
            'subtitle' => 'Automated COVID-19 Open Data Pipeline & Analytics Dashboard',
            'description' => 'An automated data pipeline and visualization dashboard ingesting daily official epidemiological datasets from the Italian Department of Civil Protection GitHub repository.',
            'content' => <<<MARKDOWN
# Near-me Data: Open Data Epidemiological Dashboard

Developed during the second pandemic wave, **Near-me Data** provided transparent, accessible visualization of complex epidemiological trends directly from official government sources.

### Live Application
- **Live Demo Dashboard**: [Explore Near-me Data (/COVID19)](/COVID19/index.php)

### Architecture & Pipeline
1. **Automated Ingestion**:
   - Polled the official Italian Civil Protection (`pcm-dpc/COVID-19`) GitHub repository daily.
   - Parsed raw multi-megabyte CSV records for national, regional, and provincial granularity.
2. **Data Normalization**:
   - Calculated 7-day rolling averages, test positivity ratios, hospitalization ICU pressure indicators, and vaccination milestone trajectories.
3. **Interactive Visualization**:
   - High-performance interactive charts powered by Chart.js with responsive filters.
   - Zero-latency cached responses generated automatically upon new commit detection.
MARKDOWN,
            'category' => 'Personal Project',
            'tech_stack' => ['PHP', 'Chart.js', 'GitHub API', 'Data Pipelines', 'Bootstrap'],
            'project_url' => '/COVID19/index.php',
            'github_url' => 'https://github.com/GianAndreaSechi',
            'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        // PYWDManager
        Project::create([
            'title' => 'PYWDManager',
            'slug' => 'pywd-manager',
            'subtitle' => 'Cryptographic CLI Password & Vault Manager in Python',
            'description' => 'A terminal-based command-line interface password manager engineered in Python. Implements robust cryptographic algorithms to securely encrypt, store, retrieve, and manage credentials directly from the shell.',
            'content' => <<<MARKDOWN
# PYWDManager: Secure CLI Password Manager

**PYWDManager** is a lightweight yet secure Command Line Interface (CLI) utility written in Python to store, encrypt, and manage credentials without relying on third-party cloud vaults.

### Core Features
- **Strong Cryptography**: Uses symmetric AES encryption and cryptographic key derivation (PBKDF2 / SHA-256) secured with a master password.
- **Zero-Cloud Architecture**: Data remains stored locally in encrypted binary vaults under user control.
- **Fast CLI Commands**:
  - `add`: Store a new credential with metadata.
  - `get`: Decrypt and copy password to clipboard.
  - `list`: View stored identifiers with masked secrets.
  - `generate`: Create cryptographically secure random passwords with configurable entropy.
MARKDOWN,
            'category' => 'Open Source',
            'tech_stack' => ['Python', 'Cryptography', 'AES Encryption', 'CLI', 'Security'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi/PYWDManager',
            'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80',
            'is_featured' => true,
            'sort_order' => 4,
        ]);

        // C19Sdk
        Project::create([
            'title' => 'C19Sdk',
            'slug' => 'c19-sdk',
            'subtitle' => 'Python SDK & Parser for Italian Government COVID-19 Datasets',
            'description' => 'A Python SDK and dataset parser designed to simplify programmatic access, statistical querying, and mathematical modeling of epidemiological open data released by the Italian Civil Protection.',
            'content' => <<<MARKDOWN
# C19Sdk: Python Parser & SDK for Open Data

**C19Sdk** is an open-source Python package developed to streamline accessing, parsing, and analyzing the COVID-19 dataset provided by the Italian Government (`https://github.com/pcm-dpc/COVID-19`).

### What It Solves
- Eliminates manual downloading and parsing of daily CSV files across national, regional, and provincial folders.
- Provides clean object-oriented Python models (`NationalData`, `RegionData`, `ProvinceData`) with built-in date filtering and delta calculations.
- Exposes structured Pandas-compatible DataFrames for immediate data science exploration and scientific analysis.
MARKDOWN,
            'category' => 'Open Source',
            'tech_stack' => ['Python', 'Open Data', 'SDK', 'Data Parsing', 'GitHub API'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi/C19Sdk',
            'image_url' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80',
            'is_featured' => true,
            'sort_order' => 5,
        ]);

        // OpenF1
        Project::create([
            'title' => 'OpenF1',
            'slug' => 'openf1',
            'subtitle' => 'Formula 1 Live Telemetry & Timing Data Ingestion Client',
            'description' => 'An open-source telemetry client and data parser designed to ingest, process, and analyze real-time Formula 1 session timing data, sector speeds, and driver telemetry metrics.',
            'content' => <<<MARKDOWN
# OpenF1: Real-Time Formula 1 Telemetry & Timing

**OpenF1** is a developer toolkit and telemetry ingestion client built to interact with live and historical Formula 1 timing datasets.

### Highlights
- Real-time ingestion of live session timing (sector times, speed traps, gap deltas).
- Car telemetry metrics parsing (throttle, brake, RPM, gear, DRS status).
- Structured API models for race simulations, lap comparison analytics, and pit window strategy modeling.
MARKDOWN,
            'category' => 'Open Source',
            'tech_stack' => ['Python', 'Telemetry', 'REST API', 'Data Streaming', 'F1 Data'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi/openf1',
            'image_url' => 'https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?auto=format&fit=crop&w=800&q=80',
            'is_featured' => true,
            'sort_order' => 6,
        ]);

        // Dynamical Systems & Numerical Integration Thesis
        Project::create([
            'title' => 'Dynamical Systems & Numerical Integration',
            'slug' => 'dynamical-systems-numerical-integration',
            'subtitle' => 'Research Thesis & Simulation on Continuous-Time Numerical Methods',
            'description' => 'Academic publication and research on continuous-time dynamical systems and numerical integration algorithms (Runge-Kutta, Euler methods). Listed in the INDIRE Italian National Register of Excellence.',
            'content' => <<<MARKDOWN
# Continuous Time Dynamical Systems & Numerical Integration Methods

This work represents the academic thesis authored at I.T.I. Primo Levi, resulting in graduation with **100/100 Summa Cum Laude** and induction into the **INDIRE - Italian National Register of Excellence**.

### Research Scope
- Mathematical analysis of continuous-time dynamical systems and ordinary differential equations (ODEs).
- Detailed algorithmic comparison between single-step numerical methods (Explicit Euler, Implicit Euler) and high-order multi-stage methods (4th Order Runge-Kutta - RK4).
- Error propagation analysis, convergence stability, and stiffness handling in numerical physical simulations.
MARKDOWN,
            'category' => 'Research & Publications',
            'tech_stack' => ['Mathematical Modeling', 'Numerical Methods', 'Algorithms', 'Research'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi/tesi-sistemi-dinamici-integrazione-numerica',
            'image_url' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?auto=format&fit=crop&w=800&q=80',
            'is_featured' => false,
            'sort_order' => 7,
        ]);

        // JQueryString
        Project::create([
            'title' => 'JQueryString',
            'slug' => 'jquery-string',
            'subtitle' => 'Lightweight QueryString Parser & Serializer',
            'description' => 'A lightweight open-source JavaScript/jQuery utility engineered to parse, extract, serialize, and manipulate URL query parameters cleanly without external overhead.',
            'content' => <<<MARKDOWN
# JQueryString: Fluent URL QueryString Utility

**JQueryString** is a client-side JavaScript / jQuery utility that simplifies reading and writing URL parameters in web applications.

### Key Capabilities
- Fluent chaining API to read, append, update, and remove query parameters.
- Clean serialization of complex nested arrays and state objects.
- Zero dependencies beyond standard DOM APIs.
MARKDOWN,
            'category' => 'Open Source',
            'tech_stack' => ['JavaScript', 'jQuery', 'Open Source'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi/JQueryString',
            'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80',
            'is_featured' => false,
            'sort_order' => 8,
        ]);

        // Personal Platform
        Project::create([
            'title' => 'Personal Platform & Engineering Blog',
            'slug' => 'personal-platform',
            'subtitle' => 'Full-Stack Laravel 12 Portfolio with Dual-Engine Blogging',
            'description' => 'Bespoke web platform with dual-engine blogging (interactive admin backoffice with split-screen markdown live preview + git-based flat-file sync) built with Laravel 12, SQLite/MySQL, and Tailwind CSS.',
            'content' => <<<MARKDOWN
# Personal Engineering Platform & Dual-Engine Blog

A custom developer platform engineered to showcase technical experience, architecture case studies, and deep technical blog posts with zero rigid CMS constraints.

### Architecture Highlights
- **Dual-Engine Blog**: Supports both browser-based writing via a dark-mode Admin Backoffice (`/admin`) and Git-versioned Markdown files in `content/posts/` with CLI bidirectional sync (`php artisan blog:sync` & `php artisan blog:export`).
- **Database Agnostic**: Fully compatible with SQLite for local development and scalable to managed MySQL in production.
- **Modern Aesthetic**: Glassmorphism dark mode with Tailwind CSS, Vite asset pipeline, and responsive typography.
MARKDOWN,
            'category' => 'Featured Work',
            'tech_stack' => ['Laravel 12', 'PHP 8.3', 'SQLite/MySQL', 'Tailwind CSS', 'Vite'],
            'project_url' => null,
            'github_url' => 'https://github.com/GianAndreaSechi',
            'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
            'is_featured' => false,
            'sort_order' => 9,
        ]);

        // 3. Welcome post
        Post::create([
            'category_id' => $backendCategory->id,
            'title' => 'Welcome to My New Website',
            'slug' => 'welcome-to-my-new-website',
            'excerpt' => 'A quick introduction to my new home on the web: my experience, selected engineering work, and a small space for writing.',
            'content' => <<<MARKDOWN
Welcome to my new website — a place to share the work, systems, and ideas that shape my career as a software engineer.

### What you can find here

- **About and résumé** — my background, career progression, and the technologies I work with.
- **Selected projects** — in-depth case studies of personal and professional engineering work, including IRIDES.
- **Engineering blog** — a focused space for occasional notes on backend systems, data platforms, cloud infrastructure, and AI.
- **Contact** — a simple way to get in touch.

The site is built with Laravel and Tailwind CSS, with a responsive interface and a small admin area for managing articles. It will evolve along with the work it documents.

Thanks for stopping by.
MARKDOWN,
            'cover_image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1200&q=80',
            'reading_time' => 2,
            'is_featured' => true,
            'tags' => ['Portfolio', 'Engineering', 'Laravel'],
            'published_at' => now(),
        ]);
    }
}
