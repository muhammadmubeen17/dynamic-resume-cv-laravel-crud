$(document).ready(function () {
    $("#add_education").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Degree</label>
                <input type="text" id="degree_title" name="degree_title[]"
                    class="form-control" placeholder="Degree" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Institute</label>
                    <input type="text" id="institute" name="institute[]"
                    class="form-control" placeholder="Institute" />
            </div>
            <div class="row mb-4">
                <div class="col-sm-6 col-12">
                <div class="form-outline">
                <label class="form-label fw-bold text-secondary">Start Date</label>
                        <input type="date" id="edu_start_date"
                            name="edu_start_date[]" class="form-control" />
                    </div>
                    </div>
                    <div class="col-sm-6 col-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">End Date</label>
                        <input type="date" id="edu_end_date"
                        name="edu_end_date[]" class="form-control" />
                    </div>
                    </div>
            </div>
            <div class="form-outline mb-4">
            <label class="form-label fw-bold text-secondary">Degree Description</label>
                    <textarea class="form-control" placeholder="Descripton" id="education_description" name="education_description[]"
                    rows="4"></textarea>
            </div>
        </div>
        </div>`;

        $(".education_section").append(html);

    });

    $("#add_experience").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Job Title</label>
                <input type="text" id="job_title" name="job_title[]"
                    class="form-control" placeholder="Job Title" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Organization</label>
                <input type="text" id="organization"
                    name="organization[]" class="form-control"
                    placeholder="Organization" />
            </div>
            <div class="row mb-4">
                <div class="col-sm-6 col-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">Start Date</label>
                        <input type="date" id="job_start_date"
                            name="job_start_date[]"
                            class="form-control" />
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">End Date</label>
                        <input type="date" id="job_end_date"
                            name="job_end_date[]" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Job Description</label>
                <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[]"
                    rows="4"></textarea>
            </div>
        </div>
        </div>`;

        $(".experience_section").append(html);

    });

    $("#add_project").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Project Title</label>
                <input type="text" id="project_title"
                    name="project_title[]" class="form-control"
                    placeholder="Project Title" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Project Description</label>
                <textarea class="form-control" placeholder="Project Descripton" id="project_description"
                    name="project_description[]" rows="4"></textarea>
            </div>
        </div>
        </div>`;

        $(".project_section").append(html);

    });

    $("#add_skill").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="row">
                <div class="col-10">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">Add Skill</label>
                        <input type="text" id="skill_name" name="skill_name[]" class="form-control" placeholder="Add Skill" value="" />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-outline">
                    <label class="form-label fw-bold text-secondary">Percentage</label>
                        <div class="input-group">
                            <input type="number" step="5"
                                id="skill_percentage"
                                name="skill_percentage[]" placeholder="%"
                                class="form-control"
                                aria-describedby="percentage">
                            <span class="input-group-text"
                                id="percentage">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>`;

        $(".skill_section").append(html);

    });

    $("#add_language").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="row">
                <div class="col-10">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">Add langauge</label>
                        <select class="form-control" id="language"
                            name="language[]">
                            <option value="">Add Language</option>
                            <option value="af">Afrikaans</option>
                            <option value="sq">Albanian - shqip</option>
                            <option value="am">Amharic - ????????????</option>
                            <option value="ar">Arabic - ??????????????</option>
                            <option value="an">Aragonese - aragon??s</option>
                            <option value="hy">Armenian - ??????????????</option>
                            <option value="ast">Asturian - asturianu</option>
                            <option value="az">Azerbaijani - az??rbaycan dili
                            </option>
                            <option value="eu">Basque - euskara</option>
                            <option value="be">Belarusian - ????????????????????</option>
                            <option value="bn">Bengali - ???????????????</option>
                            <option value="bs">Bosnian - bosanski</option>
                            <option value="br">Breton - brezhoneg</option>
                            <option value="bg">Bulgarian - ??????????????????</option>
                            <option value="ca">Catalan - catal??</option>
                            <option value="ckb">Central Kurdish - ?????????? (????????????????
                                ????????????)</option>
                            <option value="zh">Chinese - ??????</option>
                            <option value="zh-HK">Chinese (Hong Kong) - ??????????????????
                            </option>
                            <option value="zh-CN">Chinese (Simplified) - ??????????????????
                            </option>
                            <option value="zh-TW">Chinese (Traditional) - ??????????????????
                            </option>
                            <option value="co">Corsican</option>
                            <option value="hr">Croatian - hrvatski</option>
                            <option value="cs">Czech - ??e??tina</option>
                            <option value="da">Danish - dansk</option>
                            <option value="nl">Dutch - Nederlands</option>
                            <option value="en">English</option>
                            <option value="en-AU">English (Australia)</option>
                            <option value="en-CA">English (Canada)</option>
                            <option value="en-IN">English (India)</option>
                            <option value="en-NZ">English (New Zealand)</option>
                            <option value="en-ZA">English (South Africa)</option>
                            <option value="en-GB">English (United Kingdom)</option>
                            <option value="en-US">English (United States)</option>
                            <option value="eo">Esperanto - esperanto</option>
                            <option value="et">Estonian - eesti</option>
                            <option value="fo">Faroese - f??royskt</option>
                            <option value="fil">Filipino</option>
                            <option value="fi">Finnish - suomi</option>
                            <option value="fr">French - fran??ais</option>
                            <option value="fr-CA">French (Canada) - fran??ais (Canada)
                            </option>
                            <option value="fr-FR">French (France) - fran??ais (France)
                            </option>
                            <option value="fr-CH">French (Switzerland) - fran??ais
                                (Suisse)</option>
                            <option value="gl">Galician - galego</option>
                            <option value="ka">Georgian - ?????????????????????</option>
                            <option value="de">German - Deutsch</option>
                            <option value="de-AT">German (Austria) - Deutsch
                                (??sterreich)</option>
                            <option value="de-DE">German (Germany) - Deutsch
                                (Deutschland)</option>
                            <option value="de-LI">German (Liechtenstein) - Deutsch
                                (Liechtenstein)
                            </option>
                            <option value="de-CH">German (Switzerland) - Deutsch
                                (Schweiz)</option>
                            <option value="el">Greek - ????????????????</option>
                            <option value="gn">Guarani</option>
                            <option value="gu">Gujarati - ?????????????????????</option>
                            <option value="ha">Hausa</option>
                            <option value="haw">Hawaiian - ????lelo Hawai??i</option>
                            <option value="he">Hebrew - ??????????</option>
                            <option value="hi">Hindi - ??????????????????</option>
                            <option value="hu">Hungarian - magyar</option>
                            <option value="is">Icelandic - ??slenska</option>
                            <option value="id">Indonesian - Indonesia</option>
                            <option value="ia">Interlingua</option>
                            <option value="ga">Irish - Gaeilge</option>
                            <option value="it">Italian - italiano</option>
                            <option value="it-IT">Italian (Italy) - italiano (Italia)
                            </option>
                            <option value="it-CH">Italian (Switzerland) - italiano
                                (Svizzera)</option>
                            <option value="ja">Japanese - ?????????</option>
                            <option value="kn">Kannada - ???????????????</option>
                            <option value="kk">Kazakh - ?????????? ????????</option>
                            <option value="km">Khmer - ???????????????</option>
                            <option value="ko">Korean - ?????????</option>
                            <option value="ku">Kurdish - Kurd??</option>
                            <option value="ky">Kyrgyz - ????????????????</option>
                            <option value="lo">Lao - ?????????</option>
                            <option value="la">Latin</option>
                            <option value="lv">Latvian - latvie??u</option>
                            <option value="ln">Lingala - ling??la</option>
                            <option value="lt">Lithuanian - lietuvi??</option>
                            <option value="mk">Macedonian - ????????????????????</option>
                            <option value="ms">Malay - Bahasa Melayu</option>
                            <option value="ml">Malayalam - ??????????????????</option>
                            <option value="mt">Maltese - Malti</option>
                            <option value="mr">Marathi - ???????????????</option>
                            <option value="mn">Mongolian - ????????????</option>
                            <option value="ne">Nepali - ??????????????????</option>
                            <option value="no">Norwegian - norsk</option>
                            <option value="nb">Norwegian Bokm??l - norsk bokm??l
                            </option>
                            <option value="nn">Norwegian Nynorsk - nynorsk</option>
                            <option value="oc">Occitan</option>
                            <option value="or">Oriya - ???????????????</option>
                            <option value="om">Oromo - Oromoo</option>
                            <option value="ps">Pashto - ????????</option>
                            <option value="fa">Persian - ??????????</option>
                            <option value="pl">Polish - polski</option>
                            <option value="pt">Portuguese - portugu??s</option>
                            <option value="pt-BR">Portuguese (Brazil) - portugu??s
                                (Brasil)</option>
                            <option value="pt-PT">Portuguese (Portugal) - portugu??s
                                (Portugal)
                            </option>
                            <option value="pa">Punjabi - ??????????????????</option>
                            <option value="qu">Quechua</option>
                            <option value="ro">Romanian - rom??n??</option>
                            <option value="mo">Romanian (Moldova) - rom??n??
                                (Moldova)</option>
                            <option value="rm">Romansh - rumantsch</option>
                            <option value="ru">Russian - ??????????????</option>
                            <option value="gd">Scottish Gaelic</option>
                            <option value="sr">Serbian - ????????????</option>
                            <option value="sh">Serbo-Croatian - Srpskohrvatski
                            </option>
                            <option value="sn">Shona - chiShona</option>
                            <option value="sd">Sindhi</option>
                            <option value="si">Sinhala - ???????????????</option>
                            <option value="sk">Slovak - sloven??ina</option>
                            <option value="sl">Slovenian - sloven????ina</option>
                            <option value="so">Somali - Soomaali</option>
                            <option value="st">Southern Sotho</option>
                            <option value="es">Spanish - espa??ol</option>
                            <option value="es-AR">Spanish (Argentina) - espa??ol
                                (Argentina)</option>
                            <option value="es-419">Spanish (Latin America) - espa??ol
                                (Latinoam??rica)
                            </option>
                            <option value="es-MX">Spanish (Mexico) - espa??ol (M??xico)
                            </option>
                            <option value="es-ES">Spanish (Spain) - espa??ol (Espa??a)
                            </option>
                            <option value="es-US">Spanish (United States) - espa??ol
                                (Estados Unidos)
                            </option>
                            <option value="su">Sundanese</option>
                            <option value="sw">Swahili - Kiswahili</option>
                            <option value="sv">Swedish - svenska</option>
                            <option value="tg">Tajik - ????????????</option>
                            <option value="ta">Tamil - ???????????????</option>
                            <option value="tt">Tatar</option>
                            <option value="te">Telugu - ??????????????????</option>
                            <option value="th">Thai - ?????????</option>
                            <option value="ti">Tigrinya - ????????????</option>
                            <option value="to">Tongan - lea fakatonga</option>
                            <option value="tr">Turkish - T??rk??e</option>
                            <option value="tk">Turkmen</option>
                            <option value="tw">Twi</option>
                            <option value="uk">Ukrainian - ????????????????????</option>
                            <option value="ur">Urdu - ????????</option>
                            <option value="ug">Uyghur</option>
                            <option value="uz">Uzbek - o???zbek</option>
                            <option value="vi">Vietnamese - Ti???ng Vi???t</option>
                            <option value="wa">Walloon - wa</option>
                            <option value="cy">Welsh - Cymraeg</option>
                            <option value="fy">Western Frisian</option>
                            <option value="xh">Xhosa</option>
                            <option value="yi">Yiddish</option>
                            <option value="yo">Yoruba - ??d?? Yor??b??</option>
                            <option value="zu">Zulu - isiZulu</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">Level</label>
                        <div class="input-group">
                            <span class="input-group-text"
                                id="percentage">Level</span>
                            <select id="language_level" name="language_level[]"
                                placeholder="level" class="form-control"
                                aria-describedby="percentage">
                                <option value="">Select level</option>
                                <option value="Native">Native</option>
                                <option value="Fluent">Fluent</option>
                                <option value="Basic">Basic</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>`;

        $(".language_section").append(html);

    });

    $("#add_interest").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline">
                <label class="form-label fw-bold text-secondary">Add Interest</label>
                <input type="text" id="interest" name="interest[]"
                    class="form-control" placeholder="Add Interest" />
            </div>
        </div>
        </div>`;

        $(".interest_section").append(html);

    });


});

function remove_section(element) {
    $(element).closest(".card").remove();
}