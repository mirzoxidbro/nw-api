<?php

namespace Modules\ERP\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ERP\Entities\PaymentPurpose;

class PaymentPurposeSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        PaymentPurpose::create([
            'type' => 'income',
            'title' => 'from the order', // buyurtmadan
            'canBeChanged' => 'false'
        ]);

        PaymentPurpose::create([
            'type' => 'income',
            'title' => 'debt collection', // qarz undirish
            'canBeChanged' => 'false'
        ]);

        PaymentPurpose::create([
            'type' => 'income',
            'title' => 'investment', //investitsiya olish
            'canBeChanged' => 'false'
        ]);

        PaymentPurpose::create([
            'type' => 'expense',
            'title' => 'lending',   //qarz berish
            'canBeChanged' => 'false'
        ]);

        PaymentPurpose::create([
            'type' => 'income',
            'title' => 'salary distribution', //oylik taqsimoti
            'canBeChanged' => 'false'
        ]);

        PaymentPurpose::create([
            'type' => 'income',
            'title' => 'investment',
            'canBeChanged' => 'false'
        ]);
    }
}
