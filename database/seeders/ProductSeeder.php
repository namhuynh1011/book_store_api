<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desc = 'Example';
        $img = 'assets/users/image/featured/';
        $products = [
            [
                'name' => 'Sakamoto Days',
                'img' => $img.'Sakamoto.jpg',
                'price' => 200000,
                'inventory' => 10,
                'description' => $desc,
                'short_description' => 'Book Store là một hệ thống bán sách đa dạng thể loại. Các bạn hãy đến với cửa hàng của chúng tôi để có thể tìm được những cuốn sách mà bạn yêu thích.',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'category_id' => 1,
            ],
            [
                'name' => 'Di Chúc Của Bác Hồ',
                'img' => $img.'dichuccuabacho.jpg',
                'price' => 250000,
                'inventory' => 10,
                'description' => $desc,
                'short_description' => 'Book Store là một hệ thống bán sách đa dạng thể loại. Các bạn hãy đến với cửa hàng của chúng tôi để có thể tìm được những cuốn sách mà bạn yêu thích.',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'category_id' => 2,
            ],
            [
                'name' => 'Kẻ Trộm Sách',
                'img' => $img.'ketromsach.jpg',
                'price' => 230000,
                'inventory' => 10,
                'description' => $desc,
                'short_description' => 'Book Store là một hệ thống bán sách đa dạng thể loại. Các bạn hãy đến với cửa hàng của chúng tôi để có thể tìm được những cuốn sách mà bạn yêu thích.',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'category_id' => 3,
            ],
            [
                'name' => 'Attack On Titan',
                'img' => $img.'Atackontitan.jpg',
                'price' => 200000,
                'inventory' => 10,
                'description' => $desc,
                'short_description' => 'Book Store là một hệ thống bán sách đa dạng thể loại. Các bạn hãy đến với cửa hàng của chúng tôi để có thể tìm được những cuốn sách mà bạn yêu thích.',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'category_id' => 1,
            ],
            [
                'name' => 'Nicola Testla',
                'img' => $img,
                'price' => 280000,
                'inventory' => 10,
                'description' => $desc,
                'short_description' => 'Book Store là một hệ thống bán sách đa dạng thể loại. Các bạn hãy đến với cửa hàng của chúng tôi để có thể tìm được những cuốn sách mà bạn yêu thích.',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'category_id' => 3,
            ],
        
        ];

        DB::table('products')->insert($products);
    }
}
