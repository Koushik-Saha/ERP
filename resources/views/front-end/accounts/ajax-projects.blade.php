<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">


<div class="form-group">
    <label for="accountFor" class="col-form-label">For Project: <span class="required">*</span></label>
    <select name="project_id" id="accountFor" class="select2 custom-select" required>
        <option selected disabled>--- Select Project ---</option>
        @foreach($projects as $project)
            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
        @endforeach
    </select>
</div>



<!-- Select Page js files -->
<script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>

<!-- Select vendor files -->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
