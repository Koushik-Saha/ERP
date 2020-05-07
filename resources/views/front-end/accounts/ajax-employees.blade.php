/*Select vendor css files*/
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

<div class="form-group">
    <label for="accountFor" class="col-form-label">Employee: <span class="required">*</span></label>
    <select name="employee_id" id="accountFor" class="select2 form-control" required>
        <option selected disabled>--- Select Employee ---</option>
        @foreach($users as $user)
            @forelse($user->banks as $bank)
                <option value="{{ $user->id . '@' . $bank->bank_id }}">
                    {{ $user->name }} --- {{ $bank->bank_account_name }} -- {{ $bank->bank_account_no }}
                </option>
            @empty
                <option value="{{ $user->id }}">
                    {{ $user->name }} --- No Bank Account Added!
                </option>
            @endforelse
        @endforeach
    </select>
    <small class="form-text text-muted">If Employee Bank Account Not Yet Added you can't pay by is "Bank Transfer"</small>
</div>


<!-- Select Page js files -->
<script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>

<!-- Select vendor files -->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>