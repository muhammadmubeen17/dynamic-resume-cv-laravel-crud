{{ view('layouts.header') }}

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0">Edit User Profile</h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('index') }}" class="add-btn">
                        <i class="fa fa-home"></i>
                        <br> Home
                    </a>
                    <button onclick="saverecord()" class="save-btn">
                        <i class="fa fa-save"></i>
                        <br> Save
                    </button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ul class="page-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item">Edit User Profile</li>
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
                        <h3 class="card-title">Edit user Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 p-md-5 p-sm-4 p-3">
                                <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Personal Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold text-secondary">Personal Information</h2>
                                            <div class="form-outline mb-4">
                                                <input type="hidden" id="user_id" name="user_id" class="form-control"
                                                    value="{{ isset($information['personal_info']['id']) ? $information['personal_info']['id'] : '' }}" />
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12">
                                                            <div class="col-12">
                                                                <div class="form-outline mb-4">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">First
                                                                        name</label>
                                                                    <input type="text" id="first_name"
                                                                        name="first_name" placeholder="First name"
                                                                        class="form-control"
                                                                        value="{{ isset($information['personal_info']['first_name']) ? $information['personal_info']['first_name'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Last
                                                                        name</label>
                                                                    <input type="text" id="last_name"
                                                                        name="last_name" placeholder="Last name"
                                                                        class="form-control"
                                                                        value="{{ isset($information['personal_info']['last_name']) ? $information['personal_info']['last_name'] : '' }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <div class="profile_picture text-center">
                                                                <input type="file" name="image_path"
                                                                    accept="image/png, image/jpeg, image/jpg"
                                                                    onchange="display_image(this);"
                                                                    class="d-none upload-box-image">
                                                                <img class="box-image-preview img-fluid img-circle elevation-2"
                                                                    src="{{ isset($information['personal_info']['image_path']) && !empty($information['personal_info']['image_path']) ? asset('assets/images/' . $information['personal_info']['image_path']) : asset('assets/images/user-thumb.jpg') }}"
                                                                    alt="Profile picture"
                                                                    onclick="$(this).closest('.profile_picture').find('input').click();"
                                                                    style="height:150px; width:150px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">Profile
                                                    Title</label>
                                                <input type="text" id="profile_title" name="profile_title"
                                                    class="form-control" placeholder="Profile Title"
                                                    value="{{ isset($information['personal_info']['profile_title']) ? $information['personal_info']['profile_title'] : '' }}" />
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">About</label>
                                                <textarea class="form-control" placeholder="Descripton" id="about_me" name="about_me" rows="4">{{ isset($information['personal_info']['about_me']) ? $information['personal_info']['about_me'] : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold text-secondary">Contact Information</h2>
                                            @foreach ($information['contact_info'] as $contact_info)
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Email</label>
                                                                    <input type="email" id="email"
                                                                        name="email" placeholder="Email"
                                                                        class="form-control"
                                                                        value="{{ isset($contact_info['email']) ? $contact_info['email'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Phone
                                                                        number</label>
                                                                    <input type="number" id="phone_number"
                                                                        name="phone_number" placeholder="Phone Number"
                                                                        class="form-control"
                                                                        value="{{ isset($contact_info['phone_number']) ? $contact_info['phone_number'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Website</label>
                                                                    <input type="url" id="website"
                                                                        name="website" class="form-control"
                                                                        placeholder="Website"
                                                                        value="{{ isset($contact_info['website']) ? $contact_info['website'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">LinkedIn</label>
                                                                    <input type="url" id="linkedin_link"
                                                                        name="linkedin_link" class="form-control"
                                                                        placeholder="LinkedIn"
                                                                        value="{{ isset($contact_info['linkedin_link']) ? $contact_info['linkedin_link'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Github</label>
                                                                    <input type="url" id="github_link"
                                                                        name="github_link" class="form-control"
                                                                        placeholder="Github"
                                                                        value="{{ isset($contact_info['github_link']) ? $contact_info['github_link'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Twitter</label>
                                                                    <input type="text" id="twitter"
                                                                        name="twitter" class="form-control"
                                                                        placeholder="Twitter"
                                                                        value="{{ isset($contact_info['twitter']) ? $contact_info['twitter'] : '' }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Education</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_education">Add
                                                        Education</button>
                                                </div>
                                            </div>
                                            <section class="education_section">
                                                @foreach ($information['education_info'] as $edu_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Degree</label>
                                                                <input type="text" id="degree_title"
                                                                    name="degree_title[]" class="form-control"
                                                                    placeholder="Degree"
                                                                    value="{{ isset($edu_info['degree_title']) ? $edu_info['degree_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Institute</label>
                                                                <input type="text" id="institute"
                                                                    name="institute[]" class="form-control"
                                                                    placeholder="Institute"
                                                                    value="{{ isset($edu_info['institute']) ? $edu_info['institute'] : '' }}" />
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Start
                                                                            Date</label>
                                                                        <input type="date" id="edu_start_date"
                                                                            name="edu_start_date[]"
                                                                            class="form-control"
                                                                            value="{{ isset($edu_info['edu_start_date']) ? $edu_info['edu_start_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">End
                                                                            Date</label>
                                                                        <input type="date" id="edu_end_date"
                                                                            name="edu_end_date[]" class="form-control"
                                                                            value="{{ isset($edu_info['edu_end_date']) ? $edu_info['edu_end_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Description</label>
                                                                <textarea class="form-control" placeholder="Descripton" id="education_description" name="education_description[]"
                                                                    rows="4">{{ isset($edu_info['education_description']) ? $edu_info['education_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Experiencce --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Experience</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_experience">Add
                                                        Experience</button>
                                                </div>
                                            </div>
                                            <section class="experience_section">
                                                @foreach ($information['experience_info'] as $exp_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Job
                                                                    Title</label>
                                                                <input type="text" id="job_title"
                                                                    name="job_title[]" class="form-control"
                                                                    placeholder="Job Title"
                                                                    value="{{ isset($exp_info['job_title']) ? $exp_info['job_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Organization</label>
                                                                <input type="text" id="organization"
                                                                    name="organization[]" class="form-control"
                                                                    placeholder="Organization"
                                                                    value="{{ isset($exp_info['organization']) ? $exp_info['organization'] : '' }}" />
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Start
                                                                            Date</label>
                                                                        <input type="date" id="job_start_date"
                                                                            name="job_start_date[]"
                                                                            class="form-control"
                                                                            value="{{ isset($exp_info['job_start_date']) ? $exp_info['job_start_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">End
                                                                            Date</label>
                                                                        <input type="date" id="job_end_date"
                                                                            name="job_end_date[]" class="form-control"
                                                                            value="{{ isset($exp_info['job_end_date']) ? $exp_info['job_end_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Job
                                                                    Description</label>
                                                                <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[]"
                                                                    rows="4">{{ isset($exp_info['job_description']) ? $exp_info['job_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Projects --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Projects</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_project">Add
                                                        Project</button>
                                                </div>
                                            </div>
                                            <section class="project_section">
                                                @foreach ($information['project_info'] as $project_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Project
                                                                    Title</label>
                                                                <input type="text" id="project_title"
                                                                    name="project_title[]" class="form-control"
                                                                    placeholder="Project Title"
                                                                    value="{{ isset($project_info['project_title']) ? $project_info['project_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Project
                                                                    Description</label>
                                                                <textarea class="form-control" placeholder="Project Descripton" id="project_description" name="project_description[]"
                                                                    rows="4">{{ isset($project_info['project_description']) ? $project_info['project_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- SKILLS & PROFICIENCY --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Skills & Proficiency</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_skill">Add
                                                        Skill</button>
                                                </div>
                                            </div>
                                            <section class="skill_section">
                                                @foreach ($information['skill_info'] as $skill_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Add
                                                                            Skill</label>
                                                                        <input type="text" id="skill_name"
                                                                            name="skill_name[]" class="form-control"
                                                                            placeholder="Add Skill"
                                                                            value="{{ isset($skill_info['skill_name']) ? $skill_info['skill_name'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Percentage</label>
                                                                        <div class="input-group">
                                                                            <input type="number" step="5"
                                                                                min="0" max="100"
                                                                                id="skill_percentage"
                                                                                name="skill_percentage[]"
                                                                                placeholder="%" class="form-control"
                                                                                aria-describedby="percentage"
                                                                                value="{{ isset($skill_info['skill_percentage']) ? $skill_info['skill_percentage'] : '' }}" />
                                                                            <span class="input-group-text"
                                                                                id="percentage">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Languages --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Languages</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_language">Add
                                                        Language</button>
                                                </div>
                                            </div>
                                            <section class="language_section">
                                                @foreach ($information['language_info'] as $language_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Add
                                                                            langauge</label>
                                                                        <select class="form-control" id="language"
                                                                            name="language[]">
                                                                            <option value="">Add Language
                                                                            </option>
                                                                            <option value="af"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'af' ? 'selected' : '' }}>
                                                                                Afrikaans</option>
                                                                            <option value="sq"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sq' ? 'selected' : '' }}>
                                                                                Albanian - shqip</option>
                                                                            <option value="am"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'am' ? 'selected' : '' }}>
                                                                                Amharic - አማርኛ</option>
                                                                            <option value="ar"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ar' ? 'selected' : '' }}>
                                                                                Arabic - العربية</option>
                                                                            <option value="an"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'an' ? 'selected' : '' }}>
                                                                                Aragonese - aragonés</option>
                                                                            <option value="hy"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'hy' ? 'selected' : '' }}>
                                                                                Armenian - հայերեն</option>
                                                                            <option value="ast"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ast' ? 'selected' : '' }}>
                                                                                Asturian - asturianu</option>
                                                                            <option value="az"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'az' ? 'selected' : '' }}>
                                                                                Azerbaijani - azərbaycan dili</option>
                                                                            <option value="eu"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'eu' ? 'selected' : '' }}>
                                                                                Basque - euskara</option>
                                                                            <option value="be"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'be' ? 'selected' : '' }}>
                                                                                Belarusian - беларуская</option>
                                                                            <option value="bn"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'bn' ? 'selected' : '' }}>
                                                                                Bengali - বাংলা</option>
                                                                            <option value="bs"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'bs' ? 'selected' : '' }}>
                                                                                Bosnian - bosanski</option>
                                                                            <option value="br"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'br' ? 'selected' : '' }}>
                                                                                Breton - brezhoneg</option>
                                                                            <option value="bg"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'bg' ? 'selected' : '' }}>
                                                                                Bulgarian - български</option>
                                                                            <option value="ca"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ca' ? 'selected' : '' }}>
                                                                                Catalan - català</option>
                                                                            <option value="ckb"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ckb' ? 'selected' : '' }}>
                                                                                Central Kurdish - کوردی (دەستنوسی
                                                                                عەرەبی)
                                                                            </option>
                                                                            <option value="zh"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'zh' ? 'selected' : '' }}>
                                                                                Chinese - 中文</option>
                                                                            <option value="zh-HK"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'zh-HK' ? 'selected' : '' }}>
                                                                                Chinese (Hong Kong) - 中文（香港）</option>
                                                                            <option value="zh-CN"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'zh-CN' ? 'selected' : '' }}>
                                                                                Chinese (Simplified) - 中文（简体）</option>
                                                                            <option value="zh-TW"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'zn-TW' ? 'selected' : '' }}>
                                                                                Chinese (Traditional) - 中文（繁體）</option>
                                                                            <option value="co"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'co' ? 'selected' : '' }}>
                                                                                Corsican</option>
                                                                            <option value="hr"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'hr' ? 'selected' : '' }}>
                                                                                Croatian - hrvatski</option>
                                                                            <option value="cs"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'cs' ? 'selected' : '' }}>
                                                                                Czech - čeština</option>
                                                                            <option value="da"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'da' ? 'selected' : '' }}>
                                                                                Danish - dansk</option>
                                                                            <option value="nl"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'nl' ? 'selected' : '' }}>
                                                                                Dutch - Nederlands</option>
                                                                            <option value="en"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en' ? 'selected' : '' }}>
                                                                                English</option>
                                                                            <option value="en-AU"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-AU' ? 'selected' : '' }}>
                                                                                English (Australia)</option>
                                                                            <option value="en-CA"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-CA' ? 'selected' : '' }}>
                                                                                English (Canada)</option>
                                                                            <option value="en-IN"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-IN' ? 'selected' : '' }}>
                                                                                English (India)</option>
                                                                            <option value="en-NZ"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-NZ' ? 'selected' : '' }}>
                                                                                English (New Zealand)</option>
                                                                            <option value="en-ZA"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-ZA' ? 'selected' : '' }}>
                                                                                English (South Africa)</option>
                                                                            <option value="en-GB"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-GB' ? 'selected' : '' }}>
                                                                                English (United Kingdom)</option>
                                                                            <option value="en-US"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'en-US' ? 'selected' : '' }}>
                                                                                English (United States)</option>
                                                                            <option value="eo"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'eo' ? 'selected' : '' }}>
                                                                                Esperanto - esperanto</option>
                                                                            <option value="et"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'et' ? 'selected' : '' }}>
                                                                                Estonian - eesti</option>
                                                                            <option value="fo"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fo' ? 'selected' : '' }}>
                                                                                Faroese - føroyskt</option>
                                                                            <option value="fil"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fil' ? 'selected' : '' }}>
                                                                                Filipino</option>
                                                                            <option value="fi"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fi' ? 'selected' : '' }}>
                                                                                Finnish - suomi</option>
                                                                            <option value="fr"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fr' ? 'selected' : '' }}>
                                                                                French - français</option>
                                                                            <option value="fr-CA"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fr-CA' ? 'selected' : '' }}>
                                                                                French (Canada) - français (Canada)
                                                                            </option>
                                                                            <option value="fr-FR"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fr-FR' ? 'selected' : '' }}>
                                                                                French (France) - français (France)
                                                                            </option>
                                                                            <option value="fr-CH"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fr-CH' ? 'selected' : '' }}>
                                                                                French (Switzerland) - français (Suisse)
                                                                            </option>
                                                                            <option value="gl"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'gl' ? 'selected' : '' }}>
                                                                                Galician - galego</option>
                                                                            <option value="ka"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ka' ? 'selected' : '' }}>
                                                                                Georgian - ქართული</option>
                                                                            <option value="de"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'de' ? 'selected' : '' }}>
                                                                                German - Deutsch</option>
                                                                            <option value="de-AT"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'de-AT' ? 'selected' : '' }}>
                                                                                German (Austria) - Deutsch (Österreich)
                                                                            </option>
                                                                            <option value="de-DE"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'de-DE' ? 'selected' : '' }}>
                                                                                German (Germany) - Deutsch (Deutschland)
                                                                            </option>
                                                                            <option value="de-LI"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'de-LI' ? 'selected' : '' }}>
                                                                                German (Liechtenstein) - Deutsch
                                                                                (Liechtenstein)
                                                                            </option>
                                                                            <option value="de-CH"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'de-CH' ? 'selected' : '' }}>
                                                                                German (Switzerland) - Deutsch (Schweiz)
                                                                            </option>
                                                                            <option value="el"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'el' ? 'selected' : '' }}>
                                                                                Greek - Ελληνικά</option>
                                                                            <option value="gn"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'gn' ? 'selected' : '' }}>
                                                                                Guarani</option>
                                                                            <option value="gu"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'gu' ? 'selected' : '' }}>
                                                                                Gujarati - ગુજરાતી</option>
                                                                            <option value="ha"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ha' ? 'selected' : '' }}>
                                                                                Hausa</option>
                                                                            <option value="haw"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'haw' ? 'selected' : '' }}>
                                                                                Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                                            <option value="he"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'he' ? 'selected' : '' }}>
                                                                                Hebrew - עברית</option>
                                                                            <option value="hi"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'hi' ? 'selected' : '' }}>
                                                                                Hindi - हिन्दी</option>
                                                                            <option value="hu"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'hu' ? 'selected' : '' }}>
                                                                                Hungarian - magyar</option>
                                                                            <option value="is"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'is' ? 'selected' : '' }}>
                                                                                Icelandic - íslenska</option>
                                                                            <option value="id"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'id' ? 'selected' : '' }}>
                                                                                Indonesian - Indonesia</option>
                                                                            <option value="ia"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ia' ? 'selected' : '' }}>
                                                                                Interlingua</option>
                                                                            <option value="ga"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ga' ? 'selected' : '' }}>
                                                                                Irish - Gaeilge</option>
                                                                            <option value="it"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'it' ? 'selected' : '' }}>
                                                                                Italian - italiano</option>
                                                                            <option value="it-IT"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'it-IT' ? 'selected' : '' }}>
                                                                                Italian (Italy) - italiano (Italia)
                                                                            </option>
                                                                            <option value="it-CH"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'it-CH' ? 'selected' : '' }}>
                                                                                Italian (Switzerland) - italiano
                                                                                (Svizzera)
                                                                            </option>
                                                                            <option value="ja"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ja' ? 'selected' : '' }}>
                                                                                Japanese - 日本語</option>
                                                                            <option value="kn"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'kn' ? 'selected' : '' }}>
                                                                                Kannada - ಕನ್ನಡ</option>
                                                                            <option value="kk"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'kk' ? 'selected' : '' }}>
                                                                                Kazakh - қазақ тілі</option>
                                                                            <option value="km"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'km' ? 'selected' : '' }}>
                                                                                Khmer - ខ្មែរ</option>
                                                                            <option value="ko"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ko' ? 'selected' : '' }}>
                                                                                Korean - 한국어</option>
                                                                            <option value="ku"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ku' ? 'selected' : '' }}>
                                                                                Kurdish - Kurdî</option>
                                                                            <option value="ky"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ky' ? 'selected' : '' }}>
                                                                                Kyrgyz - кыргызча</option>
                                                                            <option value="lo"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'lo' ? 'selected' : '' }}>
                                                                                Lao - ລາວ</option>
                                                                            <option value="la"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'la' ? 'selected' : '' }}>
                                                                                Latin</option>
                                                                            <option value="lv"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'lv' ? 'selected' : '' }}>
                                                                                Latvian - latviešu</option>
                                                                            <option value="ln"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ln' ? 'selected' : '' }}>
                                                                                Lingala - lingála</option>
                                                                            <option value="lt"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'lt' ? 'selected' : '' }}>
                                                                                Lithuanian - lietuvių</option>
                                                                            <option value="mk"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'mk' ? 'selected' : '' }}>
                                                                                Macedonian - македонски</option>
                                                                            <option value="ms"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ms' ? 'selected' : '' }}>
                                                                                Malay - Bahasa Melayu</option>
                                                                            <option value="ml"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ml' ? 'selected' : '' }}>
                                                                                Malayalam - മലയാളം</option>
                                                                            <option value="mt"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'mt' ? 'selected' : '' }}>
                                                                                Maltese - Malti</option>
                                                                            <option value="mr"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'mr' ? 'selected' : '' }}>
                                                                                Marathi - मराठी</option>
                                                                            <option value="mn"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'mn' ? 'selected' : '' }}>
                                                                                Mongolian - монгол</option>
                                                                            <option value="ne"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'me' ? 'selected' : '' }}>
                                                                                Nepali - नेपाली</option>
                                                                            <option value="no"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'no' ? 'selected' : '' }}>
                                                                                Norwegian - norsk</option>
                                                                            <option value="nb"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'nb' ? 'selected' : '' }}>
                                                                                Norwegian Bokmål - norsk bokmål</option>
                                                                            <option value="nn"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'nn' ? 'selected' : '' }}>
                                                                                Norwegian Nynorsk - nynorsk</option>
                                                                            <option value="oc"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'oc' ? 'selected' : '' }}>
                                                                                Occitan</option>
                                                                            <option value="or"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'or' ? 'selected' : '' }}>
                                                                                Oriya - ଓଡ଼ିଆ</option>
                                                                            <option value="om"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'om' ? 'selected' : '' }}>
                                                                                Oromo - Oromoo</option>
                                                                            <option value="ps"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ps' ? 'selected' : '' }}>
                                                                                Pashto - پښتو</option>
                                                                            <option value="fa"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fa' ? 'selected' : '' }}>
                                                                                Persian - فارسی</option>
                                                                            <option value="pl"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'pl' ? 'selected' : '' }}>
                                                                                Polish - polski</option>
                                                                            <option value="pt"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'pt' ? 'selected' : '' }}>
                                                                                Portuguese - português</option>
                                                                            <option value="pt-BR"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'pt-BR' ? 'selected' : '' }}>
                                                                                Portuguese (Brazil) - português (Brasil)
                                                                            </option>
                                                                            <option value="pt-PT"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'pt-PT' ? 'selected' : '' }}>
                                                                                Portuguese (Portugal) - português
                                                                                (Portugal)
                                                                            </option>
                                                                            <option value="pa"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'pa' ? 'selected' : '' }}>
                                                                                Punjabi - ਪੰਜਾਬੀ</option>
                                                                            <option value="qu"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'qu' ? 'selected' : '' }}>
                                                                                Quechua</option>
                                                                            <option value="ro"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ro' ? 'selected' : '' }}>
                                                                                Romanian - română</option>
                                                                            <option value="mo"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'mo' ? 'selected' : '' }}>
                                                                                Romanian (Moldova) - română (Moldova)
                                                                            </option>
                                                                            <option value="rm"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'rm' ? 'selected' : '' }}>
                                                                                Romansh - rumantsch</option>
                                                                            <option value="ru"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ru' ? 'selected' : '' }}>
                                                                                Russian - русский</option>
                                                                            <option value="gd"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'gd' ? 'selected' : '' }}>
                                                                                Scottish Gaelic</option>
                                                                            <option value="sr"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sr' ? 'selected' : '' }}>
                                                                                Serbian - српски</option>
                                                                            <option value="sh"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sh' ? 'selected' : '' }}>
                                                                                Serbo-Croatian - Srpskohrvatski</option>
                                                                            <option value="sn"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sn' ? 'selected' : '' }}>
                                                                                Shona - chiShona</option>
                                                                            <option value="sd"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sd' ? 'selected' : '' }}>
                                                                                Sindhi</option>
                                                                            <option value="si"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'si' ? 'selected' : '' }}>
                                                                                Sinhala - සිංහල</option>
                                                                            <option value="sk"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sk' ? 'selected' : '' }}>
                                                                                Slovak - slovenčina</option>
                                                                            <option value="sl"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sl' ? 'selected' : '' }}>
                                                                                Slovenian - slovenščina</option>
                                                                            <option value="so"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'so' ? 'selected' : '' }}>
                                                                                Somali - Soomaali</option>
                                                                            <option value="st"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'st' ? 'selected' : '' }}>
                                                                                Southern Sotho</option>
                                                                            <option value="es"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'es' ? 'selected' : '' }}>
                                                                                Spanish - español</option>
                                                                            <option value="es-AR"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'es-AR' ? 'selected' : '' }}>
                                                                                Spanish (Argentina) - español
                                                                                (Argentina)
                                                                            </option>
                                                                            <option value="es-419"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'es-419' ? 'selected' : '' }}>
                                                                                Spanish (Latin America) - español
                                                                                (Latinoamérica)
                                                                            </option>
                                                                            <option value="es-MX"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'es-MX' ? 'selected' : '' }}>
                                                                                Spanish (Mexico) - español (México)
                                                                            </option>
                                                                            <option value="es-ES"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'es-ES' ? 'selected' : '' }}>
                                                                                Spanish (Spain) - español (España)
                                                                            </option>
                                                                            <option value="es-US"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'es-US' ? 'selected' : '' }}>
                                                                                Spanish (United States) - español
                                                                                (Estados
                                                                                Unidos)
                                                                            </option>
                                                                            <option value="su"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'su' ? 'selected' : '' }}>
                                                                                Sundanese</option>
                                                                            <option value="sw"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sw' ? 'selected' : '' }}>
                                                                                Swahili - Kiswahili</option>
                                                                            <option value="sv"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'sv' ? 'selected' : '' }}>
                                                                                Swedish - svenska</option>
                                                                            <option value="tg"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'tg' ? 'selected' : '' }}>
                                                                                Tajik - тоҷикӣ</option>
                                                                            <option value="ta"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ta' ? 'selected' : '' }}>
                                                                                Tamil - தமிழ்</option>
                                                                            <option value="tt"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'tt' ? 'selected' : '' }}>
                                                                                Tatar</option>
                                                                            <option value="te"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'te' ? 'selected' : '' }}>
                                                                                Telugu - తెలుగు</option>
                                                                            <option value="th"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'th' ? 'selected' : '' }}>
                                                                                Thai - ไทย</option>
                                                                            <option value="ti"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ti' ? 'selected' : '' }}>
                                                                                Tigrinya - ትግርኛ</option>
                                                                            <option value="to"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'to' ? 'selected' : '' }}>
                                                                                Tongan - lea fakatonga</option>
                                                                            <option value="tr"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'tr' ? 'selected' : '' }}>
                                                                                Turkish - Türkçe</option>
                                                                            <option value="tk"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'tk' ? 'selected' : '' }}>
                                                                                Turkmen</option>
                                                                            <option value="tw"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'tw' ? 'selected' : '' }}>
                                                                                Twi</option>
                                                                            <option value="uk"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'uk' ? 'selected' : '' }}>
                                                                                Ukrainian - українська</option>
                                                                            <option value="ur"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ur' ? 'selected' : '' }}>
                                                                                Urdu - اردو</option>
                                                                            <option value="ug"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'ug' ? 'selected' : '' }}>
                                                                                Uyghur</option>
                                                                            <option value="uz"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'uz' ? 'selected' : '' }}>
                                                                                Uzbek - o‘zbek</option>
                                                                            <option value="vi"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'vi' ? 'selected' : '' }}>
                                                                                Vietnamese - Tiếng Việt</option>
                                                                            <option value="wa"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'wa' ? 'selected' : '' }}>
                                                                                Walloon - wa</option>
                                                                            <option value="cy"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'cy' ? 'selected' : '' }}>
                                                                                Welsh - Cymraeg</option>
                                                                            <option value="fy"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'fy' ? 'selected' : '' }}>
                                                                                Western Frisian</option>
                                                                            <option value="xh"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'xh' ? 'selected' : '' }}>
                                                                                Xhosa</option>
                                                                            <option value="yi"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'yi' ? 'selected' : '' }}>
                                                                                Yiddish</option>
                                                                            <option value="yo"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'yo' ? 'selected' : '' }}>
                                                                                Yoruba - Èdè Yorùbá</option>
                                                                            <option value="zu"
                                                                                {{ isset($language_info['language']) && $language_info['language'] == 'zu' ? 'selected' : '' }}>
                                                                                Zulu - isiZulu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Level</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"
                                                                                id="percentage">Level</span>
                                                                            <select id="language_level"
                                                                                name="language_level[]"
                                                                                placeholder="level"
                                                                                class="form-control"
                                                                                aria-describedby="percentage">
                                                                                <option value="">Select level
                                                                                </option>
                                                                                <option value="Native"
                                                                                    {{ isset($language_info['language_level']) && $language_info['language_level'] == 'Native' ? 'selected' : '' }}>
                                                                                    Native</option>
                                                                                <option value="Fluent"
                                                                                    {{ isset($language_info['language_level']) && $language_info['language_level'] == 'Fluent' ? 'selected' : '' }}>
                                                                                    Fluent</option>
                                                                                <option value="Basic"
                                                                                    {{ isset($language_info['language_level']) && $language_info['language_level'] == 'Basic' ? 'selected' : '' }}>
                                                                                    Basic</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Interests --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Interests</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_interest">Add
                                                        interest</button>
                                                </div>
                                            </div>
                                            <section class="interest_section">
                                                @foreach ($information['interest_info'] as $interest_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline">
                                                                <label class="form-label fw-bold text-secondary">Add
                                                                    Interest</label>
                                                                <input type="text" id="interest"
                                                                    name="interest[]" class="form-control"
                                                                    placeholder="Add Interest"
                                                                    value="{{ isset($interest_info['interest']) ? $interest_info['interest'] : '' }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="1"
                                            id="verify" name="verify" required />
                                        <label for="verify" class="form-check-label text-dark"> Are you sure you
                                            want to save these changes?
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" id="submitbtn" class="btn btn-lg btn-success w-100">Save
                                        Changes</button>
                                </form>
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
