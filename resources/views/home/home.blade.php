<x-app-layout metadescription="The CodeHackers Official Blog" metatitle="CodeHackers Blog"/>

<div class="row mb-5" style="height: 100%;">
    <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 50px;">
        <h2>{{App\Models\TextWidget::getTitle('header-title')}}</h2>
        <p class="w-lg-50">{{App\Models\TextWidget::getContent('header-content')}}</p>
    </div>
</div>


@if($popularposts->count() < 3)
@else
<h1 style="font-size: 30px;margin-bottom: 20px;">Popular&nbsp;Posts</h1>
<x-popular-post :popularposts="$popularposts"/>
@endif





</div>
</div>

@if ($recommendedposts->count() < 3)



@else
    <div class="container py-4 py-xl-5">

            
        
        <h1 style="margin-top: 70px;margin-bottom: 40px;">Recommended&nbsp;Posts</h1>
        
        <x-recommended-post :recommendedposts="$recommendedposts"/>
        
    </div>
@endif

<div class="container py-4 py-xl-5">
<h1 style="margin-top: 70px;margin-bottom: 40px;">Latest&nbsp;Posts</h1>

<x-latest-post :latestposts="$latestposts"/>

</div>



<section class="py-4 py-xl-5">
    <div class="container"></div>
</section>

<livewire:email />




@component('home-components.footer')
    
@endcomponent