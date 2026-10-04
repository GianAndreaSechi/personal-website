@extends('admin.layout')

@section('title', 'Manage Categories')

@section('content')
<div class="space-y-8">
    
    <header class="pb-8 border-b border-slate-800">
        <p class="font-mono text-xs text-indigo-300">02 / taxonomy</p>
        <h1 class="mt-3 text-3xl sm:text-4xl font-extrabold tracking-tight text-white">Categories management.</h1>
        <p class="mt-3 text-sm text-slate-400">Organize articles into thematic topic pillars.</p>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left: Category Table -->
        <div class="lg:col-span-2 space-y-4">
            <div class="border border-slate-800 bg-slate-950/40 rounded-lg overflow-hidden">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="border-b border-slate-800 bg-slate-950/70 text-slate-500 font-mono text-[10px] uppercase tracking-wider">
                        <tr>
                            <th class="py-3 px-4">Color</th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4">Slug</th>
                            <th class="py-3 px-4">Articles</th>
                            <th class="py-3 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($categories as $category)
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-4 h-4 rounded" style="background-color: {{ $category->color }}"></div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="font-bold text-white text-sm">{{ $category->name }}</span>
                                @if($category->description)
                                    <p class="text-[11px] text-slate-500 mt-0.5">{{ $category->description }}</p>
                                @endif
                            </td>
                            <td class="py-3 px-4 font-mono text-slate-500">
                                #{{ $category->slug }}
                            </td>
                            <td class="py-3 px-4 font-mono text-slate-400">
                                {{ $category->posts_count }} post(s)
                            </td>
                            <td class="py-3 px-4 text-right">
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete category? Posts belonging to it will become uncategorized.');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-rose-400 transition-colors" title="Delete">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-500 font-mono text-xs">
                                No categories created yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Create Category Form -->
        <div>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-4">
                @csrf
                <p class="font-mono text-xs text-indigo-300 uppercase tracking-wider pb-2 border-b border-slate-800/80">New Category</p>

                <div>
                    <label for="name" class="block text-xs font-mono text-slate-400 mb-1.5">category name *</label>
                    <input type="text" id="name" name="name" required placeholder="e.g. Distributed Systems" class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs placeholder-slate-600 focus:outline-none focus:border-indigo-400 font-mono">
                </div>

                <div>
                    <label for="color" class="block text-xs font-mono text-slate-400 mb-1.5">accent color *</label>
                    <div class="flex items-center space-x-3">
                        <input type="color" id="color" name="color" value="#6366f1" class="w-8 h-8 rounded bg-slate-950 border border-slate-800 cursor-pointer p-0.5">
                        <span class="text-xs text-slate-500 font-mono">select badge color</span>
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-xs font-mono text-slate-400 mb-1.5">description (optional)</label>
                    <textarea id="description" name="description" rows="3" placeholder="Brief note about what this category covers..." class="w-full px-3 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-white text-xs placeholder-slate-600 focus:outline-none focus:border-indigo-400"></textarea>
                </div>

                <button type="submit" class="w-full py-2.5 rounded-lg font-semibold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors text-xs flex items-center justify-center gap-2">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>Create category</span>
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
