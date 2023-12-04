<?php

namespace App\Livewire;

use App\Models\PostView;
use Filament\Widgets\Widget;
use App\Models\LikesDislikes;
use Illuminate\Database\Eloquent\Model;

class PostOverview extends Widget
{
    protected int | string | array $columnSpan = 3;
    public ?Model $record = null;


    protected function getViewData(): array
    {
        return[
            'viewCount' => PostView::where('post_id','=',$this->record->id)->count(),
            'likes' => LikesDislikes::where('post_id','=',$this->record->id)->where('like','=',true)->count(),
            'disLikes' => LikesDislikes::where('post_id','=',$this->record->id)->where('like','=',false)->count(),
        ];

    }




    protected static string $view = 'livewire.post-overview';
}
