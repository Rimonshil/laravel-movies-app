
<div class="mt-8">
    <a href="#">
    <img src="{{ 'https://image.tmdb.org/t/p/w400/'.$movie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-1">
    </a>
    <div class="mt-2">
        <a href="#" class="mt-2 text-lg hover:text-gray-300">{{$movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span >star</span>
        <span class="ml-1">{{$movie['vote_average'] * 10 .'%'}}</span>
            <span class="ml-2"> | </span>
        <span class="ml-2">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
        </div>
        <div class="text-gray-400 text-sm">
           @foreach ($movie['genre_ids'] as $genre)
           {{ $genres->get($genre) }} @if (!$loop->last), @endif
               
           @endforeach
        </div>
    </div>
</div>
