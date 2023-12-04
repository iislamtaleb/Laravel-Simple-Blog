<div class="d-flex mb-4">
    <!-- Parent comment-->
    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
    <div class="ms-3">
        <div class="fw-bold">{{$comment->user->name}}</div>
        <span style="color: black; font-size:12px">{{$comment->created_at->diffForHumans()}}</span>
        <div style="margin-top: 10px">
            {{$comment->comment}}
        </div>
        
        <!-- Buttons for the parent comment -->
        <div class="mt-3">
            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent; border: none; color:black;">Reply</button>
            @if(Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                <button type="button" class="btn btn-sm btn-secondary" style="background-color: transparent; border: none; color:green;">Edit</button>
                <button type="button" class="btn btn-sm btn-danger" style="background-color: transparent; border: none; color:red;">Delete</button>
            @endif
        </div>
        

        <!-- Child comment 1-->
        <div class="d-flex mt-4">
            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
            <div class="ms-3">
                <div class="fw-bold">Commenter Name</div>
                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
            </div>
        </div>

        <!-- Child comment 2-->
        <div class="d-flex mt-4">
            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
            <div class="ms-3">
                <div class="fw-bold">Commenter Name</div>
                When you put money directly to a problem, it makes a good headline.
            </div>
        </div>
    </div>
</div>
