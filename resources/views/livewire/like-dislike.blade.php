<div class="mb-3" style="margin-top: 50px">
    <button type="submit" class="btn {{$isLiked ? 'btn-primary' : 'btn-outline-primary'}}" wire:click="likedDislike()">
        <i class="fas fa-thumbs-up me-2"></i> Like <span class="badge bg-primary">{{$likes}}</span>
    </button>

    <button type="submit" class="btn {{$isDisliked ? 'btn-primary' : 'btn-outline-primary'}} ms-2" wire:click="likedDislike(false)">
        <i class="fas fa-thumbs-down me-2"></i> Dislike <span class="badge bg-primary">{{$dislikes}}</span>
    </button>
</div>
