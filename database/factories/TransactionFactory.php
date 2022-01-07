<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public $transactions;
    private $sender;
    private $recipient;
    private $accountList;

    function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);

        $this->transactions = ['electronic payment', 'electronic payment', 'electronic payment', 'electronic payment',  'bank transfer', 'bank transfer', 'bank transfer', 'top-up phone', 'credit' ];

    }

    public function definition()
    {
        $this->accountList = Account::select(['account_number'])->get();
        $this->sender = $this->accountList[rand(0, count($this->accountList)-1 )]['account_number'];
        $this->recipient = function ()  {
                do {
                    $selectedAccount = $this->accountList[rand(0, count($this->accountList)-1 )]['account_number'];
                }while ($selectedAccount == $this->sender);
                return $selectedAccount;
            };

        return [
            'type' => $this->transactions[rand(0, count($this->transactions)-1 )],
            'amount' => $this->faker->numberBetween(1,9999),
            'sender' => $this->sender,
            'recipient' => $this->recipient,
            'title' => $this->faker->text(20),
            'phone_number' => $this->faker->phoneNumber(),

        ];
    }
}
