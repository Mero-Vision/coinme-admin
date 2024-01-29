<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SiteSetting extends BaseModel implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public static $keys = [

        "app_name" => [
            "type" => "text",
            "element" => "text",
            "visible" => 1,
            "display_text" => "App Name"
        ],

        "site_url" => [
            "type" => "text",
            "element" => "text",
            "visible" => 1,
            "display_text" => "Website URL"
        ],


        "email" => [
            "type" => "text",
            "element" => "text",
            "visible" => 1,
            "display_text" => "Email"
        ],


        "about_title" => [
            "type" => "text",
            "element" => "text",
            "visible" => 1,
            "display_text" => "About Title"
        ],


        "about_slogan" => [
            "type" => "text",
            "element" => "text",
            "visible" => 1,
            "display_text" => "About Slogan"
        ],

        "about_message" => [
            "type" => "text",
            "element" => "text",
            "visible" => 1,
            "display_text" => "About Message"
        ],

        "logo" => [
            "type" => "image",
            "element" => "image",
            "visible" => 1,
            "display_text" => "Site Logo"
        ],


    ];
}