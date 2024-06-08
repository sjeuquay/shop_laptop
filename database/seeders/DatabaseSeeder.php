<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //chèn bảng loai
        $loai_arr = ['Asus', 'Acer', 'Lenovo', 'MSI', 'HP', 'Dell', 'Apple', 'Surface', 'Masstel', 'LG', 'CHUWI', 'itel'];
        for ($i = 0; $i < count($loai_arr); $i++) {
            DB::table('category')->insert(
                ['name' => $loai_arr[$i], 'orderBy' => $i, 'hidden' => 1]
            );
        };
        //chèn bảng sản phẩm và thuộc tính
        $ten2_arr = [
            'Gaming ROG Strix',
            'Nitro 5 Gaming',
            'Ideapad Gaming 3',
            'Gaming GF63 Thin',
            'Gaming G15',
            'MacBook Pro',
            'Pro 9',
            'E140',
            'E116',
            'gram 2023',
            'CoreBook',
            'LarkBook',
            'ABLE',
            'Spirit',
            'ROG Strix',
            'Vivobook',
            'Zenbook',
            'Pavilion'
        ];
        $ten3_arr = [
            'G15 G513IH',
            'AN515 45 R6EV',
            '15IHU6',
            '11SC',
            'Gaming VICTUS',
            'fa0111TX i5',
            '5511 11400H',
            'M2 2022',
            '1255U',
            'N4120',
            'N4020',
            '1360P',
            'X 8259U',
            'X N5100',
            '1S N4020',
            '1155G7',
            'G15 G513IH',
            '15 X1502ZA i5',
            '14 OLED UX3402ZA',
            '15 eg2082TU'
        ];
        $hinh_arr = [
            'laptop.jpg',
            'laptop1.jpg',
            'laptop2.jpg',
            'laptop3.jpg',
            'laptop4.jpg',
            'laptop5.jpg',
            'laptop6.jpg',
            'laptop7.jpg',
            'laptop8.jpg',
            'laptop9.jpg',
            'laptop10.jpg',
            'laptop11.jpg',
            'laptop12.jpg',
            'laptop13.jpg',
            'laptop14.jpg',
            'laptop15.jpg',
            'laptop16.jpg',
        ];
        $mo_Ta  = [
            'Thiết kế HP 245 G10 đã có sự thay đổi đáng kể khi gọn gàng và vuông vắn hơn, mang đến vẻ đẹp nhẹ nhàng và thanh lịch. Máy vẫn giữ màu trắng bạc sang trọng cùng ngôn ngữ thiết kế đơn giản với logo HP nổi bật trên nắp lưng',
            'Phần viền màn hình được làm mỏng tối đa, giúp tối giản kích thước tổng thể mà không ảnh hưởng đến trải nghiệm sử dụng. Bàn phím được thiết kế tràn ra sát cạnh máy, mang lại sự thoải mái khi gõ phím. Với trọng lượng rất nhẹ chỉ 1.36kg và độ mỏng 1.79cm, HP 245 G10 là sự lựa chọn hoàn hảo cho những ai cần di chuyển nhiều, dễ dàng mang theo bất cứ đâu.',
            'Hoàn toàn yên tâm về hiệu suất khi HP 245 G10 sở hữu cấu hình cực đỉnh trong tầm giá. Laptop được trang bị bộ vi xử lý AMD Ryzen 5 7520U, con chip thuộc thế hệ 7000 series đời mới. Bộ vi xử lý này không chỉ mạnh mẽ với 4 nhân 8 luồng, tốc độ xung nhịp từ 2.8GHz đến 4.3GHz, mà còn được sản xuất trên tiến trình 6nm hiện đại. Điều này giúp máy sử dụng năng lượng hiệu quả và tối ưu hóa hiệu năng.',
            'Ryzen 5 7520U rất phù hợp cho những chiếc laptop mỏng nhẹ như HP 245 G10, không chỉ đảm bảo sức mạnh mà còn giảm tỏa nhiệt, kéo dài thời lượng pin, mang đến trải nghiệm sử dụng mượt mà và bền bỉ.'
        ];
        $loaiSP_arr = DB::table('category')->pluck('name', 'id',); /*  id là key, ten_loai là value
            1 => "Asus"
            2 => "Acer"   */
        $ram_arr = ['4GB', '8GB', '16GB', '32GB'];
        $dia_arr = ['256GB', '512GB', '1TB'];
        $card_screen = ['Intel UHD Graphics', 'AMD Radeon Graphics', 'NVIDIA GeForce RTX 3050 4GB; Intel Iris Xe Graphics', 'NVIDIA GeForce RTX 4050 6GB GDDR6; Intel Iris Xe Graphics'];
        $screen_size = ['32.4 x 21.5 x 1.79 cm', '359 x 256 x 22.8 ~ 24.3 mm', '358 x 236 x 18 mm', '32.49 x 21.39 x 1.79 ~ 1.79 cm', '324.3 x 213.8 x 17.9 mm'];
        $cannang_arr = ['1.0', '1.2', '1.4', '1.6', '1.8', '2.0', '2.3', '2.5'];
        $OS = ['window', 'linux', 'MacOS'];
        for ($i = 1; $i <= 5000; $i++) {
            $gia = mt_rand(5000000, 30000000);
            $mau_arr = ['Đen', 'Xám', 'Trắng','Bạc','Đỏ'];
            $gia_km = $gia - mt_rand(1000000, 5000000);
            $so_luong = mt_rand(0, 30); // 0 bình thường, 1 giá rẻ, 2 giảm sốc, 3 cao cấp
            $randtime = mt_rand(2022, 2024) . '-' . mt_rand(1, 12) . '-' . mt_rand(1, 28) . " 23:59:59";
            $id_loai = mt_rand(1, count($loaiSP_arr)); ///  1- 12
            $ten_loai = $loaiSP_arr[$id_loai];
            $ten_sp = $ten_loai . ' ' . Arr::random($ten2_arr) . ' ' . Arr::random($ten3_arr);
            $id = DB::table('product')->insertGetId([
                'name' =>  $ten_sp,
                'category_id' => $id_loai,
                'image' => Arr::random($hinh_arr),
                'description' => Arr::random($mo_Ta),
                'price' => $gia,
                'sale_price' => $gia_km,
                'hot' => (Arr::random([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]) % 3 == 0) ? 1 : 0,
                'time_up' => $randtime,
                'is_stock' => (Arr::random([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) % 8 == 0) ? 0 : 1,
                'view' => mt_rand(0, 1000),
                'quantity_available' => $so_luong
            ]);
            // $slug = Str::slug($ten_sp) . "-" . $id;
            // DB::table('product')->where('id', $id)->update(['slug' => $slug]);

            DB::table('specifications')->insert([
                'product_id' => $id,
                'ram' => Arr::random($ram_arr),
                'OS' => Arr::random($OS),
                'hard_disk' => Arr::random($dia_arr),
                'color' => Arr::random($mau_arr),
                'screen_size' => Arr::random($screen_size),
                'card_screen' => Arr::random($card_screen),
                'capacity' => Arr::random($cannang_arr)
            ]);
        } //for

    }
}
