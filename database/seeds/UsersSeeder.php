<?php

use App\Category;
use App\Product;
use App\Role;
use App\User;
use App\Order;
use App\Addrs;
use App\OrderDetail;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
        // Membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();
        // Membuat sample admin

        $admin = new User();
        $admin->name = "Admin";
        $admin->no_hp = '00000000';
        $admin->j_k = 'L';
        $admin->email = 'x@x.x';
        $admin->password = Hash::make('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        $admin = new User();
        $admin->name = "Adi Fatkhurozi";
        $admin->no_hp = '082136950725';
        $admin->j_k = 'L';
        $admin->email = 'ady.fatkhurozi@gmail.com';
        $admin->password = Hash::make('rahasia');
        $admin->save();
        $admin->attachRole($memberRole);

        $cat = new Category();
        $cat->title = "Fantasi";
        $cat->save();

        $prod = new Product();
        $prod->title = "Buku baca Baca";
        $prod->desc = "Buku ni Buku Baca Buku ni Buku Baca Buku ni Buku Baca Buku ni Buku Baca  Buku a Buku ni Buku Baca";
        $prod->qyt = 20;
        $prod->price = 250000;
        $prod->category_id = 1;
        $prod->img = "";
        $prod->save();
        $prod = new Product();
        $prod->title = "Mandrain";
        $prod->desc = "Buku ni Buku Baca Buku ni Buku Baca Buku ni Buku Baca Buku ni Buku Baca  Buku a Buku ni Buku Baca";
        $prod->qyt = 20;
        $prod->price = 250000;
        $prod->category_id = 1;
        $prod->img = "";
        $prod->save();

        $prod = new Addrs();
        $prod->user_id = 2;
        $prod->nama = "Satrio Piningit";
        $prod->alamat = "Semarang Barat";
        $prod->pos = "44322";
        $prod->contact = "082136950725";
        $prod->save();

        $prod = new Order();
        $prod->user_id = 2;
        $prod->price = 250000;
        $prod->addrs_id = 1;
        $prod->save();
        
        $x= new OrderDetail();
        $x->order_id = $prod->id;
        $x->product_id=1;
        $x->ket = "Beli 4";
        $x->qyt = 2000;
        $x->save();

        $x= new OrderDetail();
        $x->order_id = $prod->id;
        $x->product_id=1;
        $x->qyt = 5000;
        $x->ket = "Beli 2";
        $x->save();

        $prod = new Order();
        $prod->user_id = 1;
        $prod->price = 500000;
        $prod->addrs_id = 1;
        $prod->save();
        
        $x= new OrderDetail();
        $x->order_id = $prod->id;
        $x->product_id=1;
        $x->qyt = 5000;
        $x->ket = "Beli 2";
        $x->save();
        

    }
}
