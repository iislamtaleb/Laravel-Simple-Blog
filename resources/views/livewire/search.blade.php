<!-- resources/views/livewire/search-bar.blade.php -->

<div>
    <input wire:model="search" type="text" class="form-control" placeholder="Search...">

    @if(is_array($results) && count($results) > 0)
        <ul class="list-group mt-2">
            @foreach($results as $result)
                <li class="list-group-item">{{ $result['name'] }}</li>
            @endforeach
        </ul>
    @elseif($results instanceof \Illuminate\Support\Collection && $results->count() > 0)
        <ul class="list-group mt-2">
            @foreach($results as $result)
                <li class="list-group-item">{{ $result->name }}</li>
            @endforeach
        </ul>
    @endif
</div>
