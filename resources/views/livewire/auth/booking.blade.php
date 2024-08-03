<div>
    <form wire:submit="save" style="font-size: 20px">

        <p class="comment-form-author">
            <label for="author">Name <span class="required" aria-hidden="true">*</span></label>
            <input id="author" wire:model.blur="name" type="text" value="" size="30" maxlength="245">
            @error('name')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>
        <p class="comment-form-email">
            <label for="email">Email <span class="required" aria-hidden="true">*</span></label>
            <input id="email" wire:model.blur="email" type="email" value="" size="30" maxlength="100"
                aria-describedby="email-notes">
            @error('email')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>
        <p class="comment-form-url"><label for="phone">Phone <span class="required" aria-hidden="true">*</span></label>
            <input id="phone" wire:model.blur="phone" type="number" value="" size="30" maxlength="200">
            @error('phone')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">Did you watch the entire training before applying? <span class="required"
                    aria-hidden="true">*</span></label>
            <select wire:model.blur="watch_training_before_applying">
                <option value="">Please Select One</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            @error('watch_training_before_applying')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">What is your budget to invest in your business? <span class="required"
                    aria-hidden="true">*</span></label>
            <select wire:model.blur="budget_to_invest">
                <option value="">Please Select One</option>
                <option value="$30k +">$30k +</option>
                <option value="$10,000 - $20,000">$10,000 - $20,000</option>
                <option value="$10,000 - $20,000">$5,000 - $10,000</option>
                <option value="$10,000 - $20,000">$2,500 - $5,000</option>
                <option value="$10,000 - $20,000">$1,000 - $2,500</option>
                <option value="$10,000 - $20,000">$250 - $1,000</option>
            </select>
            @error('budget_to_invest')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">What is your biggest struggle in starting or growing an
                BeginnersFba business? <span class="required" aria-hidden="true">*</span></label>
            <textarea id="comment" wire:model.blur="struggle_growing_business" cols="45" rows="8"
                maxlength="65525"></textarea>
            @error('struggle_growing_business')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">What is your experience selling products on Amazon? <span class="required"
                    aria-hidden="true">*</span></label> <textarea id="comment"
                wire:model.blur="experience_selling_on_amazon" cols="45" rows="8" maxlength="65525"></textarea>
            @error('experience_selling_on_amazon')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">If you're accepted, how soon can you get started? <span class="required"
                    aria-hidden="true">*</span></label> <input id="phone" wire:model.blur="how_soon_will_you_start"
                type="text" value="" size="30" maxlength="200">
            @error('how_soon_will_you_start')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">Do you <b>PROMISE</b> that if you qualify you will show up to the
                call? <span class="required" aria-hidden="true">*</span></label>
            <select wire:model.blur="promise">
                <option value="">Please Select One</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            @error('promise')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="form-submit">
            <button class="login100-form-btn text-white" type="submit">
                Done
                <x-spinner />
            </button>
        </p>
    </form>
    <span class="extra-line">
        <span>Already have an account? </span>
        <a href="/access">Sign in</a>
    </span>
</div>
