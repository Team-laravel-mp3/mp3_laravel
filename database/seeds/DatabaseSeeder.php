<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(baihat_casi::class);
        $this->call(baihatduyet::class);
        $this->call(users::class);
        $this->call(theloai::class);
        $this->call(casi::class);
        $this->call(baihatmoi::class);
        $this->call(baihathot::class);
        $this->call(baihathot_casi::class);
    }
}
class baihat_casi extends Seeder
{
    public function run()
    {
        DB::table('baihat_casi')->insert([
            ['idbaihat'=>'1','idcasi'=>'1'],
            ['idbaihat'=>'1','idcasi'=>'2'],
            ['idbaihat'=>'2','idcasi'=>'1'],
            ['idbaihat'=>'2','idcasi'=>'2']
        ]);
    }
}
class baihatduyet extends Seeder
{
    public function run()
    {
        DB::table('baihatduyet')->insert([
            ['idbaihatmoi'=>'1','trangthai'=>'đã duyệt'],
            ['idbaihatmoi'=>'2','trangthai'=>'đã duyệt']
        ]);
    }
}
class baihathot_casi extends Seeder
{
    public function run()
    {
        DB::table('baihathot_casi')->insert([
            ['idbaihathot'=>'1','idcasi'=>'1'],
            ['idbaihathot'=>'1','idcasi'=>'2'],
            ['idbaihathot'=>'2','idcasi'=>'1'],
            ['idbaihathot'=>'2','idcasi'=>'2']
        ]);
    }
}
class baihathot extends Seeder
{
    public function run()
    {
        DB::table('baihathot')->insert([
            ['tenbaihathot'=>'Bước qua đời nhau','loibaihat'=>'ko có','file'=>'Buoc-Qua-Doi-Nhau-Le-Bao-Binh.mp3','image'=>'buoc-qua-doi-nhau.jpg','idtheloai'=>'1'],
            ['tenbaihathot'=>'Dừng lại ở đây thôi','loibaihat'=>'ko có','file'=>'Dung-Lai-Day-Thoi-Hoa-Vinh.mp3','image'=>'dung-lai.jpg','idtheloai'=>'1'],
            ['tenbaihathot'=>'Là bạn không thể yêu','loibaihat'=>'ko có','file'=>'Dung-Lai-Day-Thoi-Hoa-Vinh.mp3','image'=>'la-ban-ko-the.jpg','idtheloai'=>'1'],
            ['tenbaihathot'=>'Người thứ 3','loibaihat'=>'ko có','file'=>'Nguoi-Thu-3.mp3','image'=>'nguoi-thu-3.jpg','idtheloai'=>'1'],
            ['tenbaihathot'=>'Chiều hôm ấy','loibaihat'=>'ko có','file'=>'Chieu-Hom-Ay-JayKii.mp3','image'=>'chieu-hom-ay.jpg','idtheloai'=>'1']
        ]);
    }
}
class baihatmoi extends Seeder
{
    public function run()
    {
        DB::table('baihatmoi')->insert([
            ['tenbaihat'=>'Bước qua đời nhau','loibaihat'=>'ko có','file'=>'Buoc-Qua-Doi-Nhau-Le-Bao-Binh.mp3','image'=>'buoc-qua-doi-nhau.jpg','idtheloai'=>'1', 'view'=>'0', 'iduser'=>'1', 'status'=>'1'],
            ['tenbaihat'=>'Dừng lại ở đây thôi','loibaihat'=>'ko có','file'=>'Dung-Lai-Day-Thoi-Hoa-Vinh.mp3','image'=>'dung-lai.jpg','idtheloai'=>'1', 'view'=>'0', 'iduser'=>'1', 'status'=>'1'],
            ['tenbaihat'=>'Là bạn không thể yêu','loibaihat'=>'ko có','file'=>'Dung-Lai-Day-Thoi-Hoa-Vinh.mp3','image'=>'la-ban-ko-the.jpg','idtheloai'=>'1', 'view'=>'0', 'iduser'=>'1', 'status'=>'1'],
            ['tenbaihat'=>'Người thứ 3','loibaihat'=>'ko có','file'=>'Nguoi-Thu-3.mp3','image'=>'nguoi-thu-3.jpg','idtheloai'=>'1', 'view'=>'0', 'iduser'=>'1', 'status'=>'1'],
            ['tenbaihat'=>'Chiều hôm ấy','loibaihat'=>'ko có','file'=>'Chieu-Hom-Ay-JayKii.mp3','image'=>'chieu-hom-ay.jpg','idtheloai'=>'1', 'view'=>'0', 'iduser'=>'1', 'status'=>'1']
        ]);
    }
}
class casi extends Seeder
{
    public function run()
    {
        DB::table('casi')->insert([
            ['tencasi'=>'Quang Lê','anhdaidien'=>'đéo có nhé','introduce'=>'aaaaaaaaaa'],
            ['tencasi'=>'Sơn Tùng MTP','anhdaidien'=>'đéo có nhé','introduce'=>'bbbbbbbbbbb'],
            ['tencasi'=>'Jack','anhdaidien'=>'đéo có nhé','introduce'=>'aaaaaaaaaa'],
            ['tencasi'=>'Bích Phương','anhdaidien'=>'đéo có nhé','introduce'=>'bbbbbbbbbbb']
        ]);
    }
}
class theloai extends Seeder
{
    public function run()
    {
        DB::table('theloai')->insert(
            ['tentheloai'=>'bolero','image'=>''],
            ['tentheloai'=>'rock','image'=>'']
        );
    }
}
class users extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Thang',
            'email'=>'thang@12345',
            'password'=>bcrypt('123456'),
            'avatar'=>'default_avata.jpg'
        ]);
    }
}

