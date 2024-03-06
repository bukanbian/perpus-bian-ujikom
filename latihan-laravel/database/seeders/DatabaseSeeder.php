<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(3)->create();

        // Category::create([
        //     'name' => 'Novel Book',
        //     'slug' => 'novel_book'
        // ]);
        Kelas::create([
            'kelas' => 'X',
        ]);
        Kelas::create([
            'kelas' => 'XI',
        ]);
        Kelas::create([
            'kelas' => 'XII',
        ]);

        // Category::create([
        //     'name' => 'Fiction Book',
        //     'slug' => 'fiction_book'
        // ]);

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // Post::factory(20)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'Syahrul Abrian Ramadhan',
        //     'username' => 'brian',
        //     'email' => 'sahrulabrian@gmail.com',
        //     'password' => bcrypt('brian50133')
        // ]);

        // User::create([
        //     'name' => 'Nadia Nurhayati Sabri',
        //     'email' => 'Nadii@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);


        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.',
        //     'body' => '<p>obcaecati iure! Hic reprehenderit soluta alias illo dignissimos nihil saepe minus aperiam numquam voluptas, sequi ad sint. Vero esse ut velit dignissimos. Hic veniam repudiandae reiciendis, est velit pariatur voluptas quia enim non dolor, nobis et accusamus inventore. Quaerat corrupti laborum tempora sunt doloribus, illum expedita! Nam, rem ullam. Harum tempore cumque magnam facere fuga ipsam nihil deserunt, quaerat doloribus nobis quasi voluptate perspiciatis, dolorem voluptates alias neque magni aperiam nam? Neque voluptates natus deserunt itaque necessitatibus, qui quis cumque libero dolore non expedita fugit, veritatis laudantium velit odit aliquid similique totam quia. Sit assumenda, corporis, excepturi iusto fugit quasi voluptatem quibusdam quas quidem ipsa inventore modi sint dignissimos amet.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p>',
        //     'category_id' => 1,
        //     'user_id' =>1
        // ]);
        // Post::create([
        //     'title' => 'Judul keDua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.',
        //     'body' => '<p>obcaecati iure! Hic reprehenderit soluta alias illo dignissimos nihil saepe minus aperiam numquam voluptas, sequi ad sint. Vero esse ut velit dignissimos. Hic veniam repudiandae reiciendis, est velit pariatur voluptas quia enim non dolor, nobis et accusamus inventore. Quaerat corrupti laborum tempora sunt doloribus, illum expedita! Nam, rem ullam. Harum tempore cumque magnam facere fuga ipsam nihil deserunt, quaerat doloribus nobis quasi voluptate perspiciatis, dolorem voluptates alias neque magni aperiam nam? Neque voluptates natus deserunt itaque necessitatibus, qui quis cumque libero dolore non expedita fugit, veritatis laudantium velit odit aliquid similique totam quia. Sit assumenda, corporis, excepturi iusto fugit quasi voluptatem quibusdam quas quidem ipsa inventore modi sint dignissimos amet.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p>',
        //     'category_id' => 1,
        //     'user_id' =>1
        // ]);
        // Post::create([
        //     'title' => 'Judul keTiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.',
        //     'body' => '<p>obcaecati iure! Hic reprehenderit soluta alias illo dignissimos nihil saepe minus aperiam numquam voluptas, sequi ad sint. Vero esse ut velit dignissimos. Hic veniam repudiandae reiciendis, est velit pariatur voluptas quia enim non dolor, nobis et accusamus inventore. Quaerat corrupti laborum tempora sunt doloribus, illum expedita! Nam, rem ullam. Harum tempore cumque magnam facere fuga ipsam nihil deserunt, quaerat doloribus nobis quasi voluptate perspiciatis, dolorem voluptates alias neque magni aperiam nam? Neque voluptates natus deserunt itaque necessitatibus, qui quis cumque libero dolore non expedita fugit, veritatis laudantium velit odit aliquid similique totam quia. Sit assumenda, corporis, excepturi iusto fugit quasi voluptatem quibusdam quas quidem ipsa inventore modi sint dignissimos amet.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p>',
        //     'category_id' => 2,
        //     'user_id' =>2
        // ]);
        // Post::create([
        //     'title' => 'Judul keEmpat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.',
        //     'body' => '<p>obcaecati iure! Hic reprehenderit soluta alias illo dignissimos nihil saepe minus aperiam numquam voluptas, sequi ad sint. Vero esse ut velit dignissimos. Hic veniam repudiandae reiciendis, est velit pariatur voluptas quia enim non dolor, nobis et accusamus inventore. Quaerat corrupti laborum tempora sunt doloribus, illum expedita! Nam, rem ullam. Harum tempore cumque magnam facere fuga ipsam nihil deserunt, quaerat doloribus nobis quasi voluptate perspiciatis, dolorem voluptates alias neque magni aperiam nam? Neque voluptates natus deserunt itaque necessitatibus, qui quis cumque libero dolore non expedita fugit, veritatis laudantium velit odit aliquid similique totam quia. Sit assumenda, corporis, excepturi iusto fugit quasi voluptatem quibusdam quas quidem ipsa inventore modi sint dignissimos amet.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ratione soluta magnam dolore accusantium quidem nobis. Harum, esse vero molestias nulla totam neque quo? Velit quod eveniet ut pariatur deserunt.</p>',
        //     'category_id' => 1,
        //     'user_id' =>2
        // ]);
    }
}
