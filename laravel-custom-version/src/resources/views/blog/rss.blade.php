<?= '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Gian Andrea Sechi - Technical Blog</title>
        <link>{{ route('blog.index') }}</link>
        <description>Engineering articles, distributed systems, real-time AWS platforms, and software craftsmanship by Gian Andrea Sechi.</description>
        <language>en</language>
        <pubDate>{{ now()->toRssString() }}</pubDate>
        <atom:link href="{{ route('blog.rss') }}" rel="self" type="application/rss+xml" />
        @foreach($posts as $post)
        <item>
            <title><![CDATA[{{ $post->title }}]]></title>
            <link>{{ route('blog.show', $post->slug) }}</link>
            <guid isPermaLink="true">{{ route('blog.show', $post->slug) }}</guid>
            <description><![CDATA[{{ $post->excerpt }}]]></description>
            @if($post->category)
            <category><![CDATA[{{ $post->category->name }}]]></category>
            @endif
            <pubDate>{{ $post->published_at->toRssString() }}</pubDate>
        </item>
        @endforeach
    </channel>
</rss>
