@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Project')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update <span style="color: red"> {{ $projects->project_name }}</span>
                            Project </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" novalidate
                                  action="{{route('project-edit', ['id' => $projects->project_id])}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="project_name">Project Name: </label>
                                                <div class="controls position-relative has-icon-left">
                                                    <input type="text" id="project_name" class="form-control"
                                                           name="project_name"
                                                           placeholder="Project Name" required
                                                           data-validation-required-message="This Project Name field is required"
                                                           value="{{ (old('project_name') == null || strlen(old('project_name') < 5) ? $projects->project_name : old('project_name') ) }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-aperture"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="project_location">Project Location: </label>
                                                <div class="controls position-relative has-icon-left">
                                                    <input type="text" id="project_location" class="form-control"
                                                           name="project_location"
                                                           placeholder="Project Location" required
                                                           data-validation-required-message="This Project Location field is required"
                                                           value="{{ (old('project_location') == null || strlen(old('project_location') < 5) ? $projects->project_location : old('project_location') ) }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-map"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="project_price">Project Estimated Total: </label>
                                                <div class="controls position-relative has-icon-left">
                                                    <input type="number" step=0.01 id="project_price"
                                                           class="form-control" name="project_price"
                                                           placeholder="Project Estimated Total" required
                                                           data-validation-required-message="This Project Estimated Total field is required"
                                                           value="{{ (old('project_price') == null || strlen(old('project_price') < 5) ? $projects->project_price : old('project_price') ) }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-dollar-sign"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="project_status">Project Status: </label>
                                                    <div class="form-group">
                                                        <select data-placeholder="Select a state..."
                                                                class="select2-icons form-control"
                                                                id="project_status" name="project_status">
                                                            <optgroup label="Services">
                                                                <option value="1" data-icon="fa icon-activity">Active
                                                                </option>
                                                                <option value="2" data-icon="fa fa-pause">Hold</option>
                                                                <option value="3" data-icon="fa icon-x-circle">
                                                                    Cancelled
                                                                </option>
                                                                <option value="4" data-icon="fa fa-check-circle">
                                                                    Completed
                                                                </option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="project_client_id">Select Client: </label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control" id="project_client_id"
                                                                name="project_client_id">
                                                            <option disabled>Select Client</option>
                                                            @foreach($user as $users)
                                                                <option value="{{ $users->id }}" {{ ($projects->client->id == $users->id) ? 'selected' : '' }}>{{ $users->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 col-12 mb-1">
                                                    <label for="project_date">Project Start Date: </label>
                                                    <div class="form-group">
                                                        <form>
                                                            <input type='text' class="form-control pickadate"
                                                                   name="project_date" id="project_date"
                                                                   value="{{ (old('project_date') == null || strlen(old('project_date') < 5) ? $projects->project_date : old('project_date') ) }}">
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-1">
                                                    <label for="project_total_member">Estimated Project Member: </label>
                                                    <div class="input-group input-group-lg" style="width: 35.375rem">
                                                        <input id="project_total_member" type="number"
                                                               class="touchspin-color touchspin-min-max"
                                                               data-bts-button-down-class="btn btn-success"
                                                               data-bts-button-up-class="btn btn-success"
                                                               name="project_total_member"
                                                               value="{{ (old('project_total_member') == null || strlen(old('project_total_member') < 5) ? $projects->project_total_member : old('project_total_member') ) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="project_description">Project Description: </label>
                                                <fieldset class="form-group">
                                                    <textarea name="project_description" class="form-control">{{ old('project_description') }}</textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="contact-info-icon">Project Image Upload: </label>
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                               class="btn btn-primary text-white">
                                                                <i class="fa fa-picture-o"></i> Choose Images
                                                            </a>
                                                        </span>
                                                        <input id="thumbnail" class="form-control" type="text"
                                                               name="project_image"
                                                               value="{{ (old('project_image') == null || strlen(old('project_image') < 5) ? $projects->project_image : old('project_image') ) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button id="submit-all" type="submit" class="btn btn-primary mr-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


