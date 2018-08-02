<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Address;
use App\Province;
use App\Regency;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::populate();
        regency::populate();

        //sample address for customer
        $customer = User::where('email', 'customer@gmail.com')->first();
        $address1 = Address::create([
            'user_id'=>$customer->id,
            'name'=>'yadi',
            'detail'=>'Kp Kadu Beureuk Rt.03 Rw 01',
            //kota cimahi
            'regency_id'=>107,
            'phone'=>'087871243890',
        ]);

        $address1 = Address::create([
            'user_id'=>$customer->id,
            'name'=>'nurul',
            'detail'=>'Kp Batukuwung Rt.03 Rw 01',
            //kota bekasi
            'regency_id'=>55,
            'phone'=>'087871243890',
        ]);
    }
}
