<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'content',
        'image',
        'active',
    ];

    public static function getTitle($key)
    {
        $widget = \Illuminate\Support\Facades\Cache::get('text-widget-'.$key,function() use($key){
            return TextWidget::query()->where('key','=',$key)->where('active','=',true)->first();
        
        });

        if ($widget) {
            return $widget->title;
        }

        else {
            return '';
        }
    }


    public static function getContent(string $key)
    {
        $widget = \Illuminate\Support\Facades\Cache::get('text-widget-'.$key,function() use($key){
            return TextWidget::query()->where('key','=',$key)->where('active','=',true)->first();
        
        });
        
        
        

        if ($widget) {
            return $widget->content;
        }

        else {
            return '';
        }
    }



        public static function getImage(string $key)
        {
            $widget = \Illuminate\Support\Facades\Cache::get('text-widget-'.$key,function() use($key){
                return TextWidget::query()->where('key','=',$key)->where('active','=',true)->first();
            
            });

            if ($widget) {
                return $widget->image; 
            }

            else {
                return '';
            }
        }


        public static function getBlogName(string $key)
        {
            $widget = \Illuminate\Support\Facades\Cache::get('text-widget-'.$key,function() use($key){
                return TextWidget::query()->where('key','=',$key)->where('active','=',true)->first();
            
            });

            if ($widget) {
                return $widget->title; 
            }

            else {
                return '';
            }
        }

        


}
