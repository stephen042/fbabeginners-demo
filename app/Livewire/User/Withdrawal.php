<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Jobs\SendMail;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\withdrawal as Withdraw;

class Withdrawal extends Component
{
    public $amount;
    protected $rules = [
        'amount' => ['required', 'numeric', 'min:1000'],
    ];

    #[Validate('required')]
    public $account_name;

    #[Validate('required')]
    public $bank_name;

    #[Validate('required')]
    public $account_number;

    #[Validate('required')]
    public $account_type;

    #[Validate('required')]
    public $address;

    #[Validate('required')]
    public $swift_bic_code;

    public function updated($amount)
    {
        $this->validateOnly($amount);
    }

    public function save()
    {
        $this->validate();
        $user = Auth::user();

        if ($user->account_bal < $this->amount) {
            session()->flash('error', 'insufficient balance to withdraw from');
            return redirect('/users/withdrawal')->with('wire:navigate', true);
        }

        $new_balance = $user->account_bal - $this->amount;
        User::where("id","$user->id")->update([
            "account_bal" => $new_balance,
        ]);

        $result = Withdraw::create([
            "user_id" => $user->id,
            "amount" => $this->amount,
            "account_name" => $this->account_name,
            "bank_name" => $this->bank_name,
            "account_number" => $this->account_number,
            "account_type" => $this->account_type,
            "address" => $this->address,
            "swift_bic_code" => $this->swift_bic_code,
            "status" => 1,
        ]);

        if ($result) {
            $app = config('app.name');
            $userEmail = $user->email;

            $name = $user->name;
            $subject = "Withdrawal Request";



            $bodyUser = [
                "name" => $name,
                "title" => "withdrawal Request Notification",
                "message" => "We have successfully received your withdrawal request of $$this->amount, Your account will be credited after confirmation .
                <br>
                <br>
                We will get back to you with further details soon. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "withdrawal Request Notification",
                "message" => " Hello Admin a User by the name $name have successfully made a withdrawal Request of $$this->amount on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail, $subject, $bodyUser, $bodyAdmin);

            session()->flash('success', 'Withdrawal Request Created Successfully. Check Your email for more information');

            $this->reset();

            return redirect('/users/withdrawal')->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect('/users/withdrawal')->with('wire:navigate', true);
    }


    public function render()
    {
        return view('livewire.user.withdrawal');
    }
}
