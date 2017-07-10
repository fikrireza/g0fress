@php echo'<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ url('') }}</loc>
    </url>
    <url>
        <loc>{{ url('') }}/tentang-kami</loc>
    </url>
    <url>
      <loc>{{ url('') }}/produk</loc>
    </url>
    @foreach ($getProdukKategori as $produk)
      <url>
        <loc>{{ url('')}}/produk/{{ $produk->slug }}</loc>
      </url>
    @endforeach
    <url>
        <loc>{{ url('') }}/berita-info</loc>
    </url>
    @foreach($getNews as $news)
    <url>
        <loc>{{ url('') }}/berita-info/{{ $news->slug }}</loc>
    </url>
    @endforeach
    <url>
        <loc>{{ url('') }}/program-acara/</loc>
    </url>
    @foreach ($getProgEven as $event)
    <url>
        <loc>{{ url('') }}/program-acara/event/{{ $event->slug }}</loc>
    </url>
    @endforeach
    <url>
      <loc>http://amadeo.id</loc>
    </url>
</urlset>
