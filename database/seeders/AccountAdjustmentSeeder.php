<?php

namespace Database\Seeders;

use App\Models\Accounting\Account;
use App\Models\Accounting\AccountAdjustment;
use Illuminate\Database\Seeder;

class AccountAdjustmentSeeder extends Seeder
{
    public $adjustments = [

        [
            'id' => 1,
            'account_id' => 1,
            'amount' => 50000,
            'type' => 'add',
            'date' => '2022-12-5',
            'note' => '',
        ],

        [
            'id' => 2,
            'account_id' => 2,
            'amount' => 15000,
            'type' => 'add',
            'date' => '2023-1-25',
            'note' => '',
        ],

        [
            'id' => 3,
            'account_id' => 1,
            'amount' => 10000,
            'type' => 'add',
            'date' => '2023-3-25',
            'note' => '',
        ],

        [
            'id' => 4,
            'account_id' => 1,
            'amount' => 1000,
            'type' => 'subtract',
            'date' => '2023-3-25',
            'note' => '',
        ],

        [
            'id' => 5,
            'account_id' => 1,
            'amount' => 3000,
            'type' => 'subtract',
            'date' => '2023-10-25',
            'note' => '',
        ],
    ];

    public function run(): void
    {
        foreach ($this->adjustments as $adjustment) {

            AccountAdjustment::create($adjustment);
            $account = Account::where('id', $adjustment['account_id']);

            if ($adjustment['type'] == 'add') {
                $account->increment('balance', $adjustment['amount']);
            } elseif ($adjustment['type'] == 'subtract') {
                $account->decrement('balance', $adjustment['amount']);
            }
        }
    }
}
