<x-app-layout :metatitle="$post->meta_title ?: $post->title"  :metadescription="$post->meta_description"/>
    <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on: {{ $post->getDate() }}
                            
                                <span class="ms-3">
                                    <i class="fas fa-eye"></i> {{ $postViews }}
                                </span>
                            </div>
                            <!-- Post categories-->
                            @foreach($post->categories as $category)
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$category->title}}</a>
                            @endforeach
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="/storage/{{$post->thumbnail}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{!!$post->body!!}</p>
                            
                            <!-- Like and Dislike buttons with counts -->
                            <livewire:likedislike :post="$post"/>

                            

                        </section>
                    </article>
                    <!-- Comments section-->
                    <livewire:commentss :key="$post->id" :$post/>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                   
                    
                    
                </div>
            </div>
        </div>
@component('home-components.footer')
    
@endcomponent