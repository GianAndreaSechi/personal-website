@extends('admin.layout')

@section('title', 'Write New Article')

@section('content')
<form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-8">
    @csrf

    <header class="pb-6 border-b border-slate-800 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
        <div>
            <p class="font-mono text-xs text-indigo-300">01 / authoring</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold tracking-tight text-white">Write new article.</h1>
            <p class="mt-1 text-xs text-slate-400">Compose in Markdown with live split-screen preview.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 rounded-lg border border-slate-800 hover:border-slate-700 bg-slate-900/50 text-xs font-medium text-slate-400 hover:text-white transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs transition-colors flex items-center gap-2">
                <i class="fa-solid fa-cloud-arrow-up text-[11px]"></i>
                <span>Save article</span>
            </button>
        </div>
    </header>

    @if($errors->any())
        <div class="border border-rose-500/30 bg-rose-950/20 px-5 py-4 text-xs text-rose-200 space-y-1">
            <h4 class="font-mono uppercase font-bold text-rose-300">Validation errors:</h4>
            <ul class="list-disc list-inside space-y-0.5 text-rose-300">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Main Form Column (Title, Slug, Excerpt, Markdown Editor) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-mono text-slate-400 mb-2">article title *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-base font-bold placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="e.g. Scaling Real-Time Streaming on AWS with Kinesis and Lambda">
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-xs font-mono text-slate-400 mb-2">slug (url identifier)</label>
                <div class="flex items-center">
                    <span class="px-3 py-2.5 rounded-l-lg bg-slate-950/90 border border-r-0 border-slate-800 text-slate-500 text-xs font-mono">/blog/</span>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="w-full px-3 py-2.5 rounded-r-lg bg-slate-950/60 border border-slate-800 text-white text-xs font-mono placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="auto-generated-from-title">
                </div>
            </div>

            <!-- Excerpt -->
            <div>
                <label for="excerpt" class="block text-xs font-mono text-slate-400 mb-2">excerpt (short summary) *</label>
                <textarea id="excerpt" name="excerpt" rows="3" required class="w-full px-4 py-3 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs leading-relaxed placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="Brief summary of the article displayed on the blog listing and social cards...">{{ old('excerpt') }}</textarea>
            </div>

            <!-- Markdown Editor with Split-Screen Live Preview -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <label for="content" class="block text-xs font-mono text-slate-400">content (markdown) *</label>
                    
                    <!-- Markdown helper buttons -->
                    <div class="flex items-center gap-1 text-slate-400 text-xs font-mono">
                        <button type="button" onclick="insertMd('**', '**')" class="px-2 py-1 bg-slate-900 border border-slate-800 hover:border-slate-700 hover:text-white rounded font-bold" title="Bold">B</button>
                        <button type="button" onclick="insertMd('*', '*')" class="px-2 py-1 bg-slate-900 border border-slate-800 hover:border-slate-700 hover:text-white rounded italic" title="Italic">I</button>
                        <button type="button" onclick="insertMd('### ')" class="px-2 py-1 bg-slate-900 border border-slate-800 hover:border-slate-700 hover:text-white rounded" title="Heading 3">H3</button>
                        <button type="button" onclick="insertMd('```php\n', '\n```')" class="px-2 py-1 bg-slate-900 border border-slate-800 hover:border-slate-700 hover:text-white rounded" title="Code block">&lt;/&gt;</button>
                        <button type="button" onclick="insertMd('- ')" class="px-2 py-1 bg-slate-900 border border-slate-800 hover:border-slate-700 hover:text-white rounded" title="List"><i class="fa-solid fa-list-ul"></i></button>
                        <button type="button" onclick="insertMd('> ')" class="px-2 py-1 bg-slate-900 border border-slate-800 hover:border-slate-700 hover:text-white rounded" title="Quote"><i class="fa-solid fa-quote-right"></i></button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Left: Raw Markdown Input -->
                    <div>
                        <span class="text-[10px] text-slate-500 uppercase font-mono block mb-1.5">Raw Markdown</span>
                        <textarea id="content" name="content" rows="22" required class="w-full p-4 rounded-lg bg-slate-950/80 border border-slate-800 text-white font-mono text-xs placeholder-slate-600 focus:outline-none focus:border-indigo-400 leading-relaxed resize-y" placeholder="Write your post here using Markdown...&#10;&#10;### Introduction&#10;Start explaining your architecture...&#10;&#10;```php&#10;// Code snippet&#10;```">{{ old('content') }}</textarea>
                    </div>

                    <!-- Right: Real-time Live Preview -->
                    <div class="flex flex-col">
                        <span class="text-[10px] text-indigo-400 uppercase font-mono block mb-1.5 flex items-center justify-between">
                            <span>Live Render Preview</span>
                            <span class="text-slate-500" id="word-count">0 words</span>
                        </span>
                        <div id="preview" class="flex-grow p-4 rounded-lg bg-slate-950/40 border border-slate-800 text-xs overflow-y-auto max-h-[500px] text-slate-300 prose leading-relaxed">
                            <span class="text-slate-600 italic">Preview will appear here as you type...</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sidebar Options (Metadata, Category, Image, Tags, Publishing) -->
        <div class="space-y-6">
            
            <!-- Publish Card -->
            <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-4">
                <p class="font-mono text-xs text-indigo-300 uppercase tracking-wider pb-2 border-b border-slate-800/80">Publishing Status</p>
                
                <div>
                    <label for="status" class="block text-xs font-mono text-slate-400 mb-1.5">status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs focus:outline-none focus:border-indigo-400 font-mono">
                        <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Published (Live on Site)</option>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Hidden)</option>
                    </select>
                </div>

                <div>
                    <label for="published_at" class="block text-xs font-mono text-slate-400 mb-1.5">publish date</label>
                    <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs font-mono focus:outline-none focus:border-indigo-400">
                </div>

                <div class="pt-2">
                    <label class="flex items-center space-x-2.5 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded bg-slate-950 border-slate-800 text-indigo-600 focus:ring-0">
                        <span class="text-xs font-mono text-amber-300"><i class="fa-solid fa-star mr-1"></i>mark as featured</span>
                    </label>
                </div>
            </div>

            <!-- Taxonomy & Category -->
            <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-4">
                <p class="font-mono text-xs text-indigo-300 uppercase tracking-wider pb-2 border-b border-slate-800/80">Taxonomy & Meta</p>

                <div>
                    <label for="category_id" class="block text-xs font-mono text-slate-400 mb-1.5">category</label>
                    <select id="category_id" name="category_id" class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs focus:outline-none focus:border-indigo-400 font-mono">
                        <option value="">-- No Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="tags" class="block text-xs font-mono text-slate-400 mb-1.5">tags (comma-separated)</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags') }}" placeholder="AWS, Kinesis, PHP, Microservices" class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs font-mono placeholder-slate-600 focus:outline-none focus:border-indigo-400">
                </div>

                <div>
                    <label for="reading_time" class="block text-xs font-mono text-slate-400 mb-1.5">reading time (minutes)</label>
                    <input type="number" id="reading_time" name="reading_time" value="{{ old('reading_time') }}" min="1" placeholder="Leave empty for auto-calculate" class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs font-mono placeholder-slate-600 focus:outline-none focus:border-indigo-400">
                </div>
            </div>

            <!-- Cover Image -->
            <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-4">
                <p class="font-mono text-xs text-indigo-300 uppercase tracking-wider pb-2 border-b border-slate-800/80">Cover Image</p>

                <div>
                    <label for="cover_image" class="block text-xs font-mono text-slate-400 mb-1.5">image url</label>
                    <input type="url" id="cover_image" name="cover_image" value="{{ old('cover_image', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80') }}" placeholder="https://..." class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs font-mono placeholder-slate-600 focus:outline-none focus:border-indigo-400">
                </div>

                <div id="image-preview" class="rounded-lg overflow-hidden bg-slate-950 border border-slate-800 h-32 flex items-center justify-center">
                    <img id="img-tag" src="{{ old('cover_image', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80') }}" alt="Preview" class="w-full h-full object-cover">
                </div>
            </div>

        </div>

    </div>
</form>
@endsection

@push('scripts')
<script>
    // Live Markdown Render & Word Counter
    const textarea = document.getElementById('content');
    const preview = document.getElementById('preview');
    const wordCount = document.getElementById('word-count');

    function updatePreview() {
        const text = textarea.value;
        if (!text.trim()) {
            preview.innerHTML = '<span class="text-slate-600 italic">Preview will appear here as you type...</span>';
            wordCount.textContent = '0 words';
            return;
        }

        preview.innerHTML = marked.parse(text);
        
        // Count words
        const words = text.trim().split(/\s+/).filter(Boolean).length;
        const readMin = Math.max(1, Math.ceil(words / 200));
        wordCount.textContent = `${words} words (~${readMin} min read)`;
    }

    textarea.addEventListener('input', updatePreview);
    updatePreview();

    // Auto-generate slug from title
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    titleInput.addEventListener('input', () => {
        if (!slugInput.dataset.touched) {
            slugInput.value = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }
    });

    slugInput.addEventListener('input', () => {
        slugInput.dataset.touched = "true";
    });

    // Helper to insert markdown tags
    function insertMd(prefix, suffix = '') {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selected = textarea.value.substring(start, end);
        const replacement = prefix + selected + suffix;
        textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
        textarea.focus();
        textarea.setSelectionRange(start + prefix.length, start + prefix.length + selected.length);
        updatePreview();
    }

    // Cover image preview listener
    const coverInput = document.getElementById('cover_image');
    const imgTag = document.getElementById('img-tag');
    coverInput.addEventListener('input', () => {
        imgTag.src = coverInput.value || '';
    });
</script>
@endpush
