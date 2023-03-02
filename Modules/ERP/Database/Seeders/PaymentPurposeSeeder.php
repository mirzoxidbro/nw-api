<?php

namespace Modules\ERP\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ERP\Entities\TransactionPurpose;

class PaymentPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        TransactionPurpose::create([
            'type' => 'income',
            'title' => 'from the order', // buyurtmadan
            'canBeChanged' => 0
        ]);

        TransactionPurpose::create([
            'type' => 'income',
            'title' => 'debt collection', // qarz undirish
            'canBeChanged' => 0
        ]);

        // PaymentPurpose::create([
        //     'type' => 'income',
        //     'title' => 'investment', //investitsiya olish
        //     'canBeChanged' => 'false'
        // ]);

        TransactionPurpose::create([
            'type' => 'expense',
            'title' => 'lending',   //qarz berish
            'canBeChanged' => 0
        ]);

        TransactionPurpose::create([
            'type' => 'expense',
            'title' => 'salary distribution', //oylik taqsimoti
            'canBeChanged' => 0
        ]);

        TransactionPurpose::create([
            'type' => 'transfer',
            'title' => 'transfer money',
            'canBeChanged' => 0
        ]);
    }
}
