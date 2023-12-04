<section class="mb-5">
    <div class="card bg-light">
        <div class="card-body"> 
            <!-- Comment form-->
            <div class="mb-4" x-data="{ focused: false }">
                <div @click="focused = true">
                    <textarea wire:model="comment" class="form-control full-width-textarea" name="comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                </div>
                <div class="mt-2" x-show="focused">
                    <button  class="btn btn-primary" wire:click="createComment">Submit</button>
                    <button type="button" class="btn btn-secondary" @click="focused = false">Cancel</button>
                </div>
            </div>
            
            <!-- Comment with nested comments-->

            @forelse ($this->comments as $comment)
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
                        @if(auth()->id() == $comment->user_id || auth()->user()->hasRole('admin'))
                        <button wire:click="deleteComment({{ $comment->id }})" type="button" class="btn btn-sm btn-danger" style="background-color: transparent; border: none; color:red;">Delete</button>
                        @endif
                    </div>
                    
            
                    
            
                    
                </div>
            </div>
            
            @empty
                <span>No Comments</span>
            @endforelse
            
            <div class="d-flex flex-column align-items-center">
                {{$this->comments->links()}}
            </div>
        </div>
    </div>

    
</section>
