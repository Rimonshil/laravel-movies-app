@extends('layouts.main')

@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popoular-actors">
        <h2 class="uppercase text-orange-500 text-lg font-semibold tracking-wider">Popular Actors</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularActors as $actors)
            <div class="actor mt-8">
            <a href="{{ route('actors.show', $actors['id'])}}">
                <img src="{{ $actors['profile_path']}}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-1 w-40">
                </a>
                <div class="mt-2">
                <a href="{{ route('actors.show', $actors['id'])}}" class="text-lg hover:text-gray-300">{{ $actors['name']}}</a>
                <div class="text-gray-400 text-sm truncate">{{ $actors['known_for']}}</div>

                </div>
            </div>
            @endforeach 
        </div>
    </div> <!-- end popular actors-->

    <div class="page-load-status">
        <div class="flex justify-center">
            <p class="infinite-scroll-request spinner my-8 text-4xl">Loading...</p>
        </div>        
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
      </div>

  {{--  <div class="flex justify-between mt-16">
        @if ($previous)
        <a href="/actors/page/{{ $previous }}">Previous</a>
        @else
        <div></div>
        @endif

        @if ($next)
        <a href="/actors/page/{{ $next}}">Next</a>
        @else 
        <div></div>
        @endif
   
    </div>--}}
</div>
    
@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>

        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, {
        // options
        path: '/actors/page/@{{#}}',
        append: '.actor',
        status: '.page-load-status',
      //  history: false,
        });

</script>
    
@endsection