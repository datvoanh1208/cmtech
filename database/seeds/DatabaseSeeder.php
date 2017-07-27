<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('slide')->insert([
        [	
        	'name'=>'Bìa 1',
        	'image'=>'bia1.jpg',
           
        ],
        [
        	'name'=>'Bìa 2',
        	'image'=>'bia2.jpg',
        ],
        [       	
        	'name'=>'Bìa 3',
        	'image'=>'bia3.jpg',   
        ],
        [       	
        	'name'=>'Bìa 4',
        	'image'=>'bia4.jpg'
          
        ]]);
        DB::table('product')->insert([[
            
            'name'=>'Zenfone 2',
            'id_type'=>'1',
            'description'=>'Điện thoại Zenfone hãng Asus',
            'unit_price'=>'150000',
            'promotion_price'=>'120000',
            'image'=>'zen2.png',
            'unit'=>'cái',
            'new'=>'1',
           
        ],
        [
            'name'=>'Zenfone 3',
            'id_type'=>'1',
            'description'=>'Điện thoại Zenfone hãng Asus',
            'unit_price'=>'160000',
            'promotion_price'=>'0',
            'image'=>'zen3.png',
            'unit'=>'cái',
            'new'=>'0',
        ],
        [
            'name'=>'Zenfone 3 Max',
            'id_type'=>'1',
            'description'=>'Điện thoại Zenfone hãng Asus',
            'unit_price'=>'170000',
            'promotion_price'=>'110000',
            'image'=>'zen3max.png',
            'unit'=>'cái',
            'new'=>'0',
        ],
        [
            'name'=>'Zenfone Go',
            'id_type'=>'1',
            'description'=>'Điện thoại Zenfone hãng Asus',
            'unit_price'=>'180000',
            'promotion_price'=>'0',
            'image'=>'zengo.png',
            'unit'=>'cái',
            'new'=>'1',
        ],
        [
            'name'=>'Zenfone Live',
            'id_type'=>'1',
            'description'=>'Điện thoại Zenfone hãng Asus',
            'unit_price'=>'19000',
            'promotion_price'=>'13000',
            'image'=>'zenlive.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'HTC Desire 10 Pro',
            'id_type'=>'2',
            'description'=>'Điện thoại HTC',
            'unit_price'=>'192000',
            'promotion_price'=>'0',
            'image'=>'htcdesire10pro.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'HTC One A9S',
            'id_type'=>'2',
            'description'=>'Điện thoại HTC',
            'unit_price'=>'193000',
            'promotion_price'=>'0',
            'image'=>'htconea9s.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'HTC One Me',
            'id_type'=>'2',
            'description'=>'Điện thoại HTC',
            'unit_price'=>'194000',
            'promotion_price'=>'134000',
            'image'=>'htconeme.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'HTC UPlay',
            'id_type'=>'2',
            'description'=>'Điện thoại HTC',
            'unit_price'=>'195000',
            'promotion_price'=>'0',
            'image'=>'htcuplay.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'HTC Ultra Saphire',
            'id_type'=>'2',
            'description'=>'Điện thoại HTC',
            'unit_price'=>'196000',
            'promotion_price'=>'136000',
            'image'=>'htcuultrasapphire.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Huawei GR5',
            'id_type'=>'3',
            'description'=>'Điện thoại Huawei',
            'unit_price'=>'197000',
            'promotion_price'=>'0',
            'image'=>'huaweigr5.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Huawei GR5 2017 Pro',
            'id_type'=>'3',
            'description'=>'Điện thoại Huawei',
            'unit_price'=>'197000',
            'promotion_price'=>'134000',
            'image'=>'huaweigr52017pro.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Huawei Y5II',
            'id_type'=>'3',
            'description'=>'Điện thoại Huawei',
            'unit_price'=>'199000',
            'promotion_price'=>'0',
            'image'=>'huaweiy5II.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'iPhone 6 Plus',
            'id_type'=>'4',
            'description'=>'Điện thoại iPhone',
            'unit_price'=>'191000',
            'promotion_price'=>'0',
            'image'=>'iphone6plus.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'iPhone 6S Plus',
            'id_type'=>'4',
            'description'=>'Điện thoại iPhone',
            'unit_price'=>'190000',
            'promotion_price'=>'134000',
            'image'=>'iphone6splus.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'iPhone 7',
            'id_type'=>'4',
            'description'=>'Điện thoại iPhone',
            'unit_price'=>'195000',
            'promotion_price'=>'0',
            'image'=>'iphone7.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'iPhone 7 Plus',
            'id_type'=>'4',
            'description'=>'Điện thoại iPhone',
            'unit_price'=>'197000',
            'promotion_price'=>'138000',
            'image'=>'iphone7plus.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'iPhone SE',
            'id_type'=>'4',
            'description'=>'Điện thoại iPhone',
            'unit_price'=>'199000',
            'promotion_price'=>'0',
            'image'=>'iphonese.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'OPPO F1S',
            'id_type'=>'5',
            'description'=>'Điện thoại OPPO',
            'unit_price'=>'191000',
            'promotion_price'=>'131000',
            'image'=>'oppof1s.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'OPPO F3',
            'id_type'=>'5',
            'description'=>'Điện thoại OPPO',
            'unit_price'=>'192000',
            'promotion_price'=>'132000',
            'image'=>'oppof3.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'OPPO F3 Plus',
            'id_type'=>'5',
            'description'=>'Điện thoại OPPO',
            'unit_price'=>'193000',
            'promotion_price'=>'133000',
            'image'=>'oppof3plus.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'OPPO Neo 9',
            'id_type'=>'5',
            'description'=>'Điện thoại OPPO',
            'unit_price'=>'194900',
            'promotion_price'=>'0',
            'image'=>'opponeo9.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Samsung Galaxy A9 Pro',
            'id_type'=>'6',
            'description'=>'Điện thoại Samsung',
            'unit_price'=>'160000',
            'promotion_price'=>'143000',
            'image'=>'samsunggalaxya9pro.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Samsung Galaxy C9 Pro',
            'id_type'=>'6',
            'description'=>'Điện thoại Samsung',
            'unit_price'=>'174000',
            'promotion_price'=>'143000',
            'image'=>'samsunggalaxyc9pro.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Samsung Galaxy Note 5',
            'id_type'=>'6',
            'description'=>'Điện thoại Samsung',
            'unit_price'=>'144000',
            'promotion_price'=>'0',
            'image'=>'samsunggalaxynote5.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Samsung Galaxy S7 Edge',
            'id_type'=>'6',
            'description'=>'Điện thoại Samsung',
            'unit_price'=>'194000',
            'promotion_price'=>'0',
            'image'=>'samsunggalaxys7egde.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Samsung Galaxy S8',
            'id_type'=>'6',
            'description'=>'Điện thoại Samsung',
            'unit_price'=>'154000',
            'promotion_price'=>'143000',
            'image'=>'samsunggalaxys8.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Samsung Galaxy S8 Plus',
            'id_type'=>'6',
            'description'=>'Điện thoại Samsung',
            'unit_price'=>'184000',
            'promotion_price'=>'143000',
            'image'=>'samsunggalaxys8plus.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Sony XA1 Ultra',
            'id_type'=>'7',
            'description'=>'Điện thoại Sony',
            'unit_price'=>'111000',
            'promotion_price'=>'103000',
            'image'=>'SonyXA1ultra.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Sony Xperia X',
            'id_type'=>'7',
            'description'=>'Điện thoại Sony',
            'unit_price'=>'120000',
            'promotion_price'=>'114000',
            'image'=>'SonyXperiaX.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Sony Xpreia XZs',
            'id_type'=>'7',
            'description'=>'Điện thoại Sony',
            'unit_price'=>'144000',
            'promotion_price'=>'0',
            'image'=>'SonyXperiaXZs.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Sony Xperia XA Ultra',
            'id_type'=>'7',
            'description'=>'Điện thoại Sony',
            'unit_price'=>'120000',
            'promotion_price'=>'111000',
            'image'=>'XperiaXAUltra.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Sony Xperia XZDual',
            'id_type'=>'7',
            'description'=>'Điện thoại Sony',
            'unit_price'=>'120000',
            'promotion_price'=>'0',
            'image'=>'XperiaXZDual.png',
            'unit'=>'cái',
            'new'=>'1'
        ],

        [
            'name'=>'Xiaomi Mi MIX',
            'id_type'=>'8',
            'description'=>'Điện thoại Xiaomi',
            'unit_price'=>'139000',
            'promotion_price'=>'103000',
            'image'=>'XiaomiMiMIX.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Xiaomi Redmi4A',
            'id_type'=>'8',
            'description'=>'Điện thoại Xiaomi',
            'unit_price'=>'130000',
            'promotion_price'=>'0',
            'image'=>'XiaomiRedmi4a.png',
            'unit'=>'cái',
            'new'=>'0'
        ],
        [
            'name'=>'Xiaomi Redmi4X',
            'id_type'=>'8',
            'description'=>'Điện thoại Xiaomi',
            'unit_price'=>'129000',
            'promotion_price'=>'113000',
            'image'=>'XiaomiRedmi4X.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        [
            'name'=>'Xiaomi RedmiNote4',
            'id_type'=>'8',
            'description'=>'Điện thoại Xiaomi',
            'unit_price'=>'129000',
            'promotion_price'=>'0',
            'image'=>'XiaomiRedmiNote4.png',
            'unit'=>'cái',
            'new'=>'1'
        ],
        ]);
        DB::table('type_product')->insert([[
            'name'=>'ASUS',
            'description'=>'Điện thoại asus là điện thoại đến từ Đài Loan phong cách mạnh mẽ, giá hợp lí...',
            'image'=>'zen2.png',
        ],
        [
            'name'=>'HTC',
            'description'=>'Điện thoại HTC của Đài Loan',
            'image'=>'htcdesire10pro.png',
        ],
        [
            'name'=>'Huawei',
            'description'=>'Điện thoại Huawei đến từ Trung Quốc 1 trong những tập đoàn điện tử công nghệ thông tin có tiếng tăm trên thế giới',
            'image'=>'huaweigr5.png',
        ],
        [
            'name'=>'iPhone',
            'description'=>'iPhone là sản phẩm di động của hãng Apple đặt tại thung lũng Silicon bang California Mỹ, được sản xuất tại TQ với giá khá mềm dành cho dân thu nhập trung bình',
            'image'=>'iphone6plus.png',
        ],
        [
            'name'=>'OPPO',
            'description'=>'Điện thoại đến từ Trung Quốc thích hợp cho giới trẻ dùng để Selfie',
            'image'=>'oppof1s.png',
        ],
        [
            'name'=>'Samsung',
            'description'=>'Điện thoại của hãng Samsung đến từ Hàn Quốc đối thủ cạnh tranh mạnh mẽ với Apple',
            'image'=>'samsunggalaxya9pro.png',
        ],
        [
            'name'=>'Sony',
            'description'=>'Điện thoại Sony của hãng Sony từ Nhật Bản',
            'image'=>'SonyXA1ultra.png',
        ],
        [
            'name'=>'Xiaomi',
            'description'=>'Điện thoại Xiaomi đến từ Trung Quốc',
            'image'=>'XiaomiMiMIX.png'
        ]
        ]);

        DB::table('users')->insert([
            'full_name' => 'voanhdat',
            'email' => 'voanhdat2008@gmail.com',
            'level' => '1',
            'password' => '$2y$10$VEtMOerbI305KP8e9EUvFeakoar.LKmbAaaWPo3QMlKO70qVLByM6',
            'phone' => '0123123123',
            'address' => 'houston',

        ]);
    }
}
