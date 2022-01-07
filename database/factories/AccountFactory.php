<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class AccountFactory extends Factory
{

    public $usersIdList;
    public $accountTypeList;
    public $accountType;
    public $interest;
    public $balance;
    public $amount_of_installment;
    public $number_of_installment;

    function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->accountTypeList = ['savings account', 'credit account', 'regular account'];

    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->accountType = $this->accountTypeList[rand(0, count($this->accountTypeList)-1 )];
        $this->usersIdList = User::select(['id'])->get();
        $this->balance = $this->faker->numberBetween(1, 99999);
        $this->interest = null;
        $this->amount_of_installment = null;
        $this->number_of_installment = null;
        if ($this->accountType != 'regular account' ) {
            $this->interest = $this->faker->numberBetween(3, 7);
            if ($this->accountType == 'credit account'){
                $this->amount_of_installment = $this->faker->numberBetween(1,$this->balance/12 );
                $this->number_of_installment = $this->balance / $this->amount_of_installment;
            }
        }
        return [
            'id_user' => $this->usersIdList[rand(0, count($this->usersIdList)-1 )],
            'account_number' => $this->faker->iban('','',26),
            'type' => $this->accountType,
            'balance' => $this->balance,
            //TODO Zrobić osobną tabeele i model dla kredytów i kąt oszczędnościowych i tam przenieść oprocentowanie, ratę kredytu itp, ale na froncie będąmieli trudniej
            'interest' => $this->interest,
            'amount_of_installment' => $this->amount_of_installment,
            'number_of_installment' => $this->number_of_installment,

        ];
    }
}
