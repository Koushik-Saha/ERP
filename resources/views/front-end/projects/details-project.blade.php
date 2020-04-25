@extends('layouts/contentLayoutMaster')

@section('title', 'Advance Card')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-ecommerce.css')) }}">
@endsection
@section('content')
    <!-- Basic example and Profile cards section start -->
    <section id="basic-examples">
        <div class="row match-height">
            <!-- Profile Cards Starts -->
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-1">
                <div class="card">
                    <div class="card-header mx-auto pb-0">
                        <div class="row m-0">
                            <div class="col-sm-12 text-center">
                                <h4>{{$project->project_name}}</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p class="">{{$project->project_location}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                @if($project->project_image !== null)
                                    <img class="img-fluid" src="{{ asset($project->project_image) }}" alt="{{ $project->project_name }}">
                                @else
                                    <img class="img-fluid" src="{{asset('images/labour-image/man.png')}}" alt="None">
                                @endif
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="uploads">
                                    <button class="btn btn-success bsoft-btn" data-toggle="modal" data-target="#completeProjectModal" title="Mark as Complete">
                                        <i class="feather icon-check-circle"></i>
                                    </button>
                                </div>
                                <div class="followers">
                                    @if($project->project_status !== 'hold')
                                        <button class="btn btn-warning bsoft-btn" data-toggle="modal" data-target="#holdProjectModal" title="Hold This Project">
                                            <i class="feather icon-alert-triangle"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-primary bsoft-btn" data-toggle="modal" data-target="#activeProjectModal" title="Start This Project Again">
                                            <i class="feather icon-alert-triangle"></i>
                                        </button>
                                    @endif
                                </div>
                                <div class="following">
                                    <button class="btn btn-danger bsoft-btn" data-toggle="modal" data-target="#cancelProjectModal" title="Cancel This Project">
                                        <i class="feather icon-x-circle"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn gradient-light-primary btn-block mt-2">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-2">
                <div class="card">
                    <div class="card-header mx-auto pb-0">
                        <div class="row m-0">
                            <div class="col-sm-12 text-center">
                                <h4>Zoila Legore</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p class="">Frontend Dev</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                <img class="img-fluid" src="{{ asset('images/portrait/small/avatar-s-12.jpg') }}"
                                     alt="img placeholder">
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="uploads">
                                    <p class="font-weight-bold font-medium-2 mb-0">568</p>
                                    <span class="">Uploads</span>
                                </div>
                                <div class="followers">
                                    <p class="font-weight-bold font-medium-2 mb-0">78.6k</p>
                                    <span class="">Followers</span>
                                </div>
                                <div class="following">
                                    <p class="font-weight-bold font-medium-2 mb-0">112</p>
                                    <span class="">Following</span>
                                </div>
                            </div>
                            <button class="btn gradient-light-primary btn-block mt-2">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-3">
                <div class="card">
                    <div class="card-header mx-auto pb-0">
                        <div class="row m-0">
                            <div class="col-sm-12 text-center">
                                <h4>{{$project->client->name}}</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p class="">{{\App\Helpers\Helper::mobileNumber($project->client->mobile)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                <img class="img-fluid" src="{{ asset('images/portrait/small/avatar-s-12.jpg') }}"
                                     alt="img placeholder">
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="uploads">
                                    <p class="font-weight-bold font-medium-2 mb-0">568</p>
                                    <span class="">Uploads</span>
                                </div>
                                <div class="followers">
                                    <p class="font-weight-bold font-medium-2 mb-0">78.6k</p>
                                    <span class="">Followers</span>
                                </div>
                                <div class="following">
                                    <p class="font-weight-bold font-medium-2 mb-0">112</p>
                                    <span class="">Following</span>
                                </div>
                            </div>
                            <button class="btn gradient-light-primary btn-block mt-2">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Cards Ends -->
        </div>
    </section>
    <!-- // Basic example and Profile cards section end -->

    <!-- Overlay Image and Chat Section Starts -->
    <section id="overlay-image-chat-cards">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card overlay-img-card text-white">
                    <img src="{{ asset('images/pages/card-image-6.jpg') }}" class="card-img" alt="card-img-6">
                    <div class="card-img-overlay overlay-black d-flex flex-column justify-content-between">
                        <h5 class="card-title text-white">Beautiful Overlay</h5>
                        <div class="card-content">
                            Cake sesame snaps cupcake gingerbread danish I love gingerbread. Apple pie pie jujubes chupa chups muffin
                            halvah lollipop.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card overlay-img-card text-white">
                    <img src="{{ asset('images/pages/card-image-5.jpg') }}" class="card-img" alt="card-img-6">
                    <div class="card-img-overlay overlay-black">
                        <h5 class="font-medium-5 text-white text-center mt-4">Snowy</h5>
                        <p class="text-white text-center">New York</p>
                        <div class="card-content">
                            <div class="d-flex justify-content-around mt-2">
                                <div class="icon">
                                    <i class="feather icon-cloud-snow font-large-5"></i>
                                </div>
                                <div class="temprature mt-3">
                                    <p class="font-large-3"> -6 <span class="mt-1">&#176;</span></p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="precipitation">
                                        <span class="font-medium-3">Precipitation</span>
                                    </div>
                                    <div class="degree">
                                        <span class="font-medium-3">48%</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <div class="humidity">
                                        <span class="font-medium-3">Humidity</span>
                                    </div>
                                    <div class="degree">
                                        <span class="font-medium-3">60%</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <div class="wind">
                                        <span class="font-medium-3">Wind</span>
                                    </div>
                                    <div class="degree">
                                        <span class="font-medium-3">23 km/h</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card chat-application">
                    <div class="card-header">
                        <h4 class="card-title">Chat</h4>
                    </div>
                    <div class="chat-app-window">
                        <div class="user-chats">
                            <div class="chats">
                                <div class="chat chat-left">
                                    <div class="chat-avatar mt-50">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title=""
                                           data-original-title="">
                                            <img src="{{ asset('images/portrait/small/avatar-s-2.jpg') }}" alt="avatar" height="40"
                                                 width="40" />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>Cake sesame snaps cupcake gingerbread</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat">
                                    <div class="chat-avatar">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title=""
                                           data-original-title="">
                                            <img src="{{ asset('images/portrait/small/avatar-s-5.jpg') }}" alt="avatar" height="40"
                                                 width="40" />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>Apple pie pie jujubes chupa chups muffin</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat chat-left">
                                    <div class="chat-avatar mt-50">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title=""
                                           data-original-title="">
                                            <img src="{{ asset('images/portrait/small/avatar-s-2.jpg') }}" alt="avatar" height="40"
                                                 width="40" />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>Chocolate cake</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat">
                                    <div class="chat-avatar">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title=""
                                           data-original-title="">
                                            <img src="{{ asset('images/portrait/small/avatar-s-5.jpg') }}" alt="avatar" height="40"
                                                 width="40" />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>Donut sweet pie oat cake dragée fruitcake</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat chat-left">
                                    <div class="chat-avatar mt-50">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title=""
                                           data-original-title="">
                                            <img src="{{ asset('images/portrait/small/avatar-s-2.jpg') }}" alt="avatar" height="40"
                                                 width="40" />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>Liquorice chocolate bar jelly beans icing</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat">
                                    <div class="chat-avatar mt-50">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title=""
                                           data-original-title="">
                                            <img src="{{ asset('images/portrait/small/avatar-s-5.jpg') }}" alt="avatar" height="40"
                                                 width="40" />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>Pudding candy</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="card-body d-flex justify-content-around pt-0">
                                <input type="text" class="form-control mr-50" placeholder="Type your Message">
                                <button type="button" class="btn btn-icon btn-primary"><i class="feather icon-navigation"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Overlay Image and Chat Section Starts -->

    <!-- Admin and Video Section Starts -->
    <section id="admin-video">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            Vuexy Admin
                        </h4>
                        <p class="">by Pixinvent Creative Studio</p>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><span><i class="feather icon-more-vertical"></i></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('images/pages/content-img-4.jpg') }}" alt="img placeholder">
                            <div class="d-flex justify-content-start mt-2">
                                <div class="icon-like mr-2">
                                    <i class="feather icon-thumbs-up text-success font-medium-5 align-middle"></i>
                                    <span>368</span>
                                </div>
                                <div class="icon-comment mr-2">
                                    <i class="feather icon-message-square font-medium-5 align-middle text-primary"></i>
                                    <span>341</span>
                                </div>
                                <div class="icon-dislike">
                                    <i class="feather icon-thumbs-down font-medium-5 align-middle text-danger"></i>
                                    <span>53</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/WALZwXyxpHQ"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Admin and Video Section Starts -->

    <!-- Timeline Starts -->
    <section id="timeline-card">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Left Timeline</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="activity-timeline timeline-left list-unstyled">
                                <li>
                                    <div class="timeline-icon bg-primary">
                                        <i class="feather icon-plus font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Task Added</p>
                                        <span>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</span>
                                    </div>
                                    <small class="">25 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-warning">
                                        <i class="feather icon-alert-circle font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Task Updated</p>
                                        <span>Cupcake gummi bears soufflé caramels candy</span>
                                    </div>
                                    <small class="">15 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-success">
                                        <i class="feather icon-check font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Task Completed</p>
                                        <span>Candy ice cream cake. Halvah gummi bears
                    </span>
                                    </div>
                                    <small class="">20 minutes ago</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Right Timeline</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="activity-timeline timeline-right list-unstyled">
                                <li>
                                    <div class="timeline-icon bg-primary">
                                        <i class="feather icon-plus font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Task Added</p>
                                        <span>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</span>
                                    </div>
                                    <small class="">25 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-warning">
                                        <i class="feather icon-alert-circle font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Task Updated</p>
                                        <span>Cupcake gummi bears soufflé caramels candy</span>
                                    </div>
                                    <small class="">15 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-success">
                                        <i class="feather icon-check font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Task Completed</p>
                                        <span>Candy ice cream cake. Halvah gummi bears
                    </span>
                                    </div>
                                    <small class="">20 minutes ago</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Timeline Ends -->
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/app-chat.js')) }}"></script>
@endsection
