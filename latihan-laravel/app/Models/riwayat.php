<?php

namespace App\Models;


class Post
{
    private static $blog_post = [
        [
            "title" => "Judul belajar laravel",
            "slug" => "judul-belajar-laravel",
            "author" => "Brian",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere consequuntur nisi quam commodi tempora quaerat cum, dicta corporis dolorum at natus veritatis laborum fugiat perspiciatis nulla aut corrupti vitae? Iste!"
        ],
        [
            "title" => "Judul belajar laravel2",
            "slug" => "judul-belajar-laravel2",
            "author" => "Brian Ramadhan",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, iste? Recusandae aut vero dolorem amet officia placeat mollitia pariatur vitae reprehenderit quia. Fuga temporibus nisi itaque obcaecati, culpa inventore sit voluptate minus ab, ad, vel dignissimos possimus commodi illo quisquam. Praesentium amet itaque labore blanditiis ex ab! Id exercitationem quos, nostrum totam eveniet ut, error similique molestiae voluptate, porro aspernatur. Quia dicta exercitationem minus doloremque illum molestias aliquid, aut cupiditate nam ipsum neque sit dolores tenetur repudiandae eum illo eius."
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstwhere('slug', $slug);
    }
}

