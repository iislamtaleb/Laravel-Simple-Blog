<div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
    @foreach ($recommendedposts as $post)
    <div class="col">
        <div class="card">
            <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="storage/{{ $post->thumbnail }}">
            <div class="card-body p-4" style="max-height: 300px; overflow-y: auto;">
                <p class="text-primary card-text mb-0">
                    @foreach ($post->categories as $category)
                            <a href="#" style="text-decoration: none; text-transform: capitalize;">{{ $category->title }}</a>
                    @endforeach
                </p>
                <h4 class="card-title"><a href="{{ route('show_post', $post->slug) }}" style="text-decoration: none; color:#212529">{!!$post->getShortPostTitle()!!}</a></h4>
                <p class="card-text">{!!$post->getShortPostDesc()!!}</p>
                <div class="d-flex">
                    <div>
                        <p class="fw-bold mb-0">By {{$post->user->name}}</p>
                        <p class="text-muted mb-0">Shared on {{$post->getDate()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>



