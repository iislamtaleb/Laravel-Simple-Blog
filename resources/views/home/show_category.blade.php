<x-app-layout :metatitle="'CodeHackers Blog -'.' '.$category->title"/>

<div class="row mb-5" style="height: 100%;">
    <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 50px;">
        <h2>{{$category->title}}</h2>
    </div>
</div><div class="search-bar">
<input type="search" class="form-control rounded" placeholder="Search Article" aria-label="Search" aria-describedby="search-addon" />
<button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
</div> 


<x-category-post :posts="$posts"/>


</div>
</div>


<section class="py-4 py-xl-5">
    <div class="container"></div>
</section>







@component('home-components.footer')
    
@endcomponent