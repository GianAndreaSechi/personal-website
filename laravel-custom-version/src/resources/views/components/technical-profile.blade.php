@props(['compact' => false])

<section aria-labelledby="technical-profile-title" class="rounded-xl border border-slate-800 bg-slate-950/40 {{ $compact ? 'p-5 sm:p-6' : 'p-5 sm:p-7' }}">
    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-800 pb-4">
        <h2 id="technical-profile-title" class="text-sm font-semibold text-slate-200">At a glance</h2>
        <span class="font-mono text-xs text-slate-500">profile.json</span>
    </div>
    @php
        $technicalProfile = [
            'role' => config('profile.role'),
            'company' => config('profile.company'),
            'stack' => config('profile.stack'),
        ];
    @endphp
    <pre class="mt-5 text-xs {{ $compact ? '' : 'sm:text-sm' }} leading-7 whitespace-pre-wrap break-words text-slate-400"><code><span>{</span>
@foreach($technicalProfile as $key => $value)
  <span class="text-indigo-300">{{ json_encode($key) }}</span>: <span class="text-emerald-300">{{ json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) }}</span>{{ $loop->last ? '' : ',' }}
@endforeach
<span>}</span></code></pre>
</section>
