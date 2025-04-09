<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $img = '/assets/users/images/featured/feature-';
        
          $products = [
            [
                'name'=> 'Thịt bò nạt',
                'img'=> $img . '1.jpg',
                'price'=> 200000,
                'inventory'=> 20,
                'sort_description'=> 'SiVi SHOP là một trong những hệ thống cửa hàng hoa quả nhập khẩu ở Đà Nẵng cung cấp cho quý khách những trái dưa lưới Egardentươi ngon nhất cũng như các loại hoa quả nhập khẩu, hoa quả vùng miền khác.',
                'facebook'=> '123',
                'linkedin'=> '123',
                'category_id' => 1
            ]
        ];

        DB::table('products')->insert($products);
    }
}
