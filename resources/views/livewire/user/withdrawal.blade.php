<div class="card-body p-4">

    <!-- Vertical Form -->
    <form class="row g-3" wire:submit="save">
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Amount (USD) <em class="btn btn-primary" @disabled(true)>Balance: ${{auth()->user()->account_bal}}</em></label>
            <input type="number" wire:model.blur="amount" class="form-control" id="inputEmail4">
            @error('amount')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Acount Name</label>
            <input type="text" wire:model.blur="account_name" class="form-control" id="inputEmail4">
            @error('account_name')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">Bank Name</label>
            <input type="text" wire:model.blur="bank_name" class="form-control" id="number">
            @error('bank_name')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">Account Number</label>
            <input type="number" wire:model.blur="account_number" class="form-control" id="number">
            @error('account_number')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">Account Type</label>
            <input type="text" wire:model.blur="account_type" class="form-control" id="number">
            @error('account_type')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">Full Address</label>
            <input type="text" wire:model.blur="address" class="form-control" placeholder="E.g 1234 Elm Street, Apt 56, Springfield, IL 62704, USA" >
            @error('address')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">SWIFT/BIC Code</label>
            <input type="text" wire:model.blur="swift_bic_code" class="form-control" id="number">
            @error('swift_bic_code')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="text-center">
            <button type="reset" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary btn-sm px-4">
                Request
                <x-spinner />
            </button>
        </div>
    </form><!-- Vertical Form -->

</div>