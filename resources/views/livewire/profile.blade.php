
<x-app-layout metatitle="{{$user->name}} Profile" metadescription="{{$user->name}} User Profile"/>

<section class="position-relative py-4 py-xl-5" style="margin-bottom: 200px">
    <div class="container position-relative">
        <div class="row">
            <div class="col" style="display: flex;">
                <form class="p-3 p-xl-4" method="">
                    <h4>Edit Your Profile Informations</h4>
                    <p class="text-muted">Eros ligula lobortis elementum amet commodo ac nibh ornare, eu lobortis.</p>
                    <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" disabled></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" disabled></div>
                    <div class="mb-3"></div>
                    <div class="mb-3"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModalName">Change Name</button></div>
                    <div class="mb-3"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModalEmail">Change Email</button></div>
                    <div class="mb-3"><button class="btn btn-primary" type="button" style="width: 122px;" data-bs-toggle="modal" data-bs-target="#myModalPassword">Change&nbsp;Pass</button></div>
                </form>
            </div>
            <div class="col-md-6 col-xl-4">
                <div></div>
            </div>
        </div>
    </div>
</section>

{{-- Change Name Model --}}
<x-name-modal>

</x-name-modal>


{{-- Change Email Model --}}
<x-email-modal>

</x-email-modal>


{{-- Change Password Model --}}
<x-password-modal>

</x-password-modal>

@component('home-components.footer')
    
@endcomponent

@livewireScripts