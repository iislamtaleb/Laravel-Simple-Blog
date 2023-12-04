<div class="mb-4" x-data="{ focused: false }">
    <div @click="focused = true">
        <textarea wire:model="comment" class="form-control" name="comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
    </div>
    <div class="mt-2" x-show="focused">
        <button type="submit" class="btn btn-primary" wire:click="createComment">Submit</button>
        <button type="button" class="btn btn-secondary" @click="focused = false">Cancel</button>
    </div>
</div>
