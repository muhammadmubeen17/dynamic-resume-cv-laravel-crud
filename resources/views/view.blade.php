{{ view('layouts.header') }}

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0">User Profile</h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('index') }}" class="add-btn">
                        <i class="fa fa-home"></i>
                        <br> Home
                    </a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ul class="page-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item">User profiles</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ isset($information['personal_info']['first_name']) ? $information['personal_info']['first_name'] : 'Empty' }}
                            {{ isset($information['personal_info']['last_name']) ? $information['personal_info']['last_name'] : '' }}'s
                            Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid wrapper">
                            <div class="row">
                                <div class="sidebar-wrapper col-4">
                                    <div class="profile-container">
                                        <img class="profile box-image-preview img-fluid img-circle elevation-2" src="{{ isset($information['personal_info']['image_path']) && !empty($information['personal_info']['image_path']) ? asset('assets/images/'. $information['personal_info']['image_path'])  : asset('assets/images/user-thumb.jpg') }}"
                                            alt="" style="height:200px; width:200px;" />
                                        <h1 class="name">
                                            {{ isset($information['personal_info']['first_name']) ? $information['personal_info']['first_name'] : '' }}
                                            {{ isset($information['personal_info']['last_name']) ? $information['personal_info']['last_name'] : '' }}
                                        </h1>
                                        <h3 class="tagline">
                                            {{ isset($information['personal_info']['profile_title']) ? $information['personal_info']['profile_title'] : '' }}
                                        </h3>
                                    </div>
                                    <!--//profile-container-->

                                    <div class="contact-container container-block">
                                        <ul class="list-unstyled contact-list">
                                            @if (!empty($information['contact_info']['email']))
                                                <li class="email"><i class="fa-solid fa-envelope"></i>
                                                    <a class="ms-3"
                                                        href="mailto: {{ isset($information['contact_info']['email']) ? $information['contact_info']['email'] : 'yourmail@example.com' }}">{{ isset($information['contact_info']['email']) ? $information['contact_info']['email'] : '' }}</a>
                                                </li>
                                            @endif
                                            @if (!empty($information['contact_info']['phone_number']))
                                                <li class="phone"><i class="fa-solid fa-phone"></i>
                                                    <a class="ms-3"
                                                        href="tel:{{ isset($information['contact_info']['phone_number']) ? $information['contact_info']['phone_number'] : '' }}">{{ isset($information['contact_info']['phone_number']) ? $information['contact_info']['phone_number'] : '' }}</a>
                                                </li>
                                            @endif
                                            @if (!empty($information['contact_info']['website']))
                                                <li class="website"><i class="fa-solid fa-globe"></i>
                                                    <a class="ms-3"
                                                        href="{{ isset($information['contact_info']['website']) ? $information['contact_info']['website'] : '' }}"
                                                        target="_blank">{{ isset($information['contact_info']['website']) ? $information['contact_info']['website'] : '' }}</a>
                                                </li>
                                            @endif
                                            @if (!empty($information['contact_info']['linkedin_link']))
                                                <li class="linkedin"><i class="fa-brands fa-linkedin-in"></i>
                                                    <a class="ms-3"
                                                        href="{{ isset($information['contact_info']['linkedin_link']) ? $information['contact_info']['linkedin_link'] : '' }}"
                                                        target="_blank">{{ isset($information['contact_info']['linkedin_link']) ? $information['contact_info']['linkedin_link'] : '' }}</a>
                                                </li>
                                            @endif
                                            @if (!empty($information['contact_info']['github_link']))
                                                <li class="github"><i class="fa-brands fa-github"></i>
                                                    <a class="ms-3"
                                                        href="{{ isset($information['contact_info']['github_link']) ? $information['contact_info']['github_link'] : '' }}"
                                                        target="_blank">{{ isset($information['contact_info']['github_link']) ? $information['contact_info']['github_link'] : '' }}</a>
                                                </li>
                                            @endif
                                            @if (!empty($information['contact_info']['twitter']))
                                                <li class="twitter"><i class="fa-brands fa-twitter"></i>
                                                    <a class="ms-3"
                                                        href="{{ isset($information['contact_info']['twitter']) ? $information['contact_info']['twitter'] : '' }}"
                                                        target="_blank">{{ isset($information['contact_info']['twitter']) ? $information['contact_info']['twitter'] : '' }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <!--//contact-container-->

                                    @if (!empty($information['education_info']))
                                        <div class="education-container container-block">
                                            <h2 class="container-block-title">Education</h2>
                                            @foreach ($information['education_info'] as $education_info)
                                                <div class="item">
                                                    <h4 class="degree">
                                                        {{ isset($education_info['degree_title']) ? $education_info['degree_title'] : '' }}
                                                    </h4>
                                                    <h5 class="meta">
                                                        {{ isset($education_info['institute']) ? $education_info['institute'] : '' }}
                                                    </h5>
                                                    <div class="time">
                                                        {{ isset($education_info['edu_start_date']) ? $education_info['edu_start_date'] : '' }}
                                                        -
                                                        {{ isset($education_info['edu_end_date']) ? $education_info['edu_end_date'] : '' }}
                                                    </div>
                                                    <p>{{ isset($education_info['education_description']) ? $education_info['education_description'] : '' }}
                                                    </p>
                                                </div>
                                            @endforeach
                                            <!--//item-->
                                        </div>
                                        <!--//education-container-->
                                    @endif

                                    @if (!empty($information['language_info']))
                                        <div class="languages-container container-block">
                                            <h2 class="container-block-title">Languages</h2>
                                            <ul class="list-unstyled interests-list">
                                                @foreach ($information['language_info'] as $language_info)
                                                    <li>{{ isset($language_info['language']) ? $language_info['language'] : '' }}
                                                        <span class="lang-desc">
                                                            ({{ isset($language_info['language_level']) ? $language_info['language_level'] : '' }})
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!--//languages-->
                                    @endif

                                    @if (!empty($information['interest_info']))
                                        <div class="interests-container container-block">
                                            <h2 class="container-block-title">Interests</h2>
                                            <ul class="list-unstyled interests-list">
                                                @foreach ($information['interest_info'] as $interest_info)
                                                    <li>
                                                        {{ isset($interest_info['interest']) ? $interest_info['interest'] : '' }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!--//interests-->
                                    @endif

                                </div>
                                <!--//sidebar-wrapper-->

                                <div class="main-wrapper col-8">
                                    @if (!empty($information['personal_info']['about_me']))
                                        <section class="section summary-section">
                                            <h2 class="section-title">
                                                <span class="icon-holder">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                Career Profile
                                            </h2>
                                            <div class="summary">
                                                <p>
                                                    {{ isset($information['personal_info']['about_me']) ? $information['personal_info']['about_me'] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis aliquam est harum minima dolorem nisi, et beatae dolorum atque eius necessitatibus molestiae perferendis, ipsum esse.' }}
                                                </p>
                                            </div>
                                            <!--//summary-->
                                        </section>
                                        <!--//section-->
                                    @endif

                                    @if (!empty($information['experience_info']))
                                        <section class="section experiences-section">
                                            <h2 class="section-title">
                                                <span class="icon-holder"><i class="fa-solid fa-briefcase"></i>
                                                </span>
                                                Experiences
                                            </h2>
                                            @foreach ($information['experience_info'] as $experience_info)
                                                <div class="item">
                                                    <div class="meta">
                                                        <div class="upper-row">
                                                            <h3 class="job-title">
                                                                {{ isset($experience_info['job_title']) ? $experience_info['job_title'] : '' }}
                                                            </h3>
                                                            <div class="time">
                                                                {{ isset($experience_info['job_start_date']) ? $experience_info['job_start_date'] : '' }}
                                                                -
                                                                {{ isset($experience_info['job_end_date']) ? $experience_info['job_end_date'] : '' }}
                                                            </div>
                                                        </div>
                                                        <!--//upper-row-->
                                                        <div class="company">
                                                            {{ isset($experience_info['organization']) ? $experience_info['organization'] : '' }}
                                                        </div>
                                                    </div>
                                                    <!--//meta-->
                                                    <div class="details">
                                                        <p>{{ isset($experience_info['job_description']) ? $experience_info['job_description'] : '' }}
                                                        </p>
                                                    </div>
                                                    <!--//details-->
                                                </div>
                                                <!--//item-->
                                            @endforeach

                                        </section>
                                        <!--//section-->
                                    @endif

                                    @if (!empty($information['project_info']))
                                        <section class="section projects-section">
                                            <h2 class="section-title">
                                                <span class="icon-holder"><i class="fa-solid fa-archive"></i></span>
                                                Projects
                                            </h2>
                                            @foreach ($information['project_info'] as $project_info)
                                                <div class="item">
                                                    <span class="project-title">
                                                        <a
                                                            target="_blank">{{ isset($project_info['project_title']) ? $project_info['project_title'] : '' }}</a>
                                                    </span>
                                                    -
                                                    <span class="project-tagline">
                                                        {{ isset($project_info['project_description']) ? $project_info['project_description'] : '' }}
                                                    </span>

                                                </div>
                                                <!--//item-->
                                            @endforeach

                                        </section>
                                        <!--//section-->
                                    @endif

                                    @if (!empty($information['skill_info']))
                                        <section class="skills-section section">
                                            <h2 class="section-title"><span class="icon-holder"><i
                                                        class="fa-solid fa-rocket"></i></span>Skills
                                                &amp; Proficiency</h2>
                                            <div class="skillset">
                                                @foreach ($information['skill_info'] as $skill_info)
                                                    <div class="item">
                                                        <h3 class="level-title">
                                                            {{ isset($skill_info['skill_name']) ? $skill_info['skill_name'] : '' }}
                                                        </h3>
                                                        <div class="progress level-bar">
                                                            <div class="progress-bar theme-progress-bar"
                                                                role="progressbar"
                                                                style="width: {{ isset($skill_info['skill_percentage']) ? $skill_info['skill_percentage'] : '0' }}%"
                                                                aria-valuenow="{{ isset($skill_info['skill_percentage']) ? $skill_info['skill_percentage'] : '0' }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <!--//item-->
                                                @endforeach
                                            </div>
                                        </section>
                                        <!--//skills-section-->
                                    @endif

                                </div>
                                <!--//main-body-->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

{{ view('layouts.footer') }}
