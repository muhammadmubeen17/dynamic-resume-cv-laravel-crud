<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interests;
use App\Models\Languages;
use App\Models\PersonalInformation;
use App\Models\Projects;
use App\Models\Skills;
use Illuminate\Http\Request;

class Userprofile extends Controller
{
    public function index()
    {
        $personal_information   = PersonalInformation::get()->toArray();

        if (!empty($personal_information)) {

            $user_data = array();
            foreach ($personal_information as $personal_info) {

                $user_id = $personal_info['id'];

                if (!empty($user_id)) {
                    $user_info['personal_info']         = $personal_info;


                    $contact_info                       = ContactInformation::find($user_id);
                    if (!empty($contact_info)) {

                        $user_info['contact_info']      = $contact_info->toArray();
                    }

                    $education_info                     = Education::find($user_id);
                    if (!empty($education_info)) {
                        $user_info['education_info']    = $education_info->toArray();
                    }

                    $experience_info                    = Experience::find($user_id);
                    if (!empty($experience_info)) {
                        $user_info['experience_info']   = $experience_info->toArray();
                    }

                    $project_info                       = Projects::find($user_id);
                    if (!empty($project_info)) {
                        $user_info['project_info']      = $project_info->toArray();
                    }

                    $skill_info                         = Skills::find($user_id);
                    if (!empty($skill_info)) {
                        $user_info['skill_info']        = $skill_info->toArray();
                    }

                    $language_info                      = Languages::find($user_id);
                    if (!empty($language_info)) {
                        $user_info['language_info']     = $language_info->toArray();
                    }

                    $interest_info                      = Interests::find($user_id);
                    if (!empty($interest_info)) {
                        $user_info['interest_info']     = $interest_info->toArray();
                    }
                }

                array_push($user_data, $user_info);
            }
        } else {
            $user_data = array();
        }

        return view('index', ['users_data' => $user_data]);
    }

    public function view($id)
    {
        if (!empty($id)) {
            $personal_information       = PersonalInformation::find($id)->toArray();
            $contact_information        = ContactInformation::where('user_id', $id)->get()->first()->toArray();
            $education_information      = Education::where('user_id', $id)->get()->toArray();
            $experience_information     = Experience::where('user_id', $id)->get()->toArray();
            $project_information        = Projects::where('user_id', $id)->get()->toArray();
            $skill_information          = Skills::where('user_id', $id)->get()->toArray();
            $language_information       = Languages::where('user_id', $id)->get()->toArray();
            $interest_information       = Interests::where('user_id', $id)->get()->toArray();

            $info['personal_info']      = $personal_information;
            $info['contact_info']       = $contact_information;
            $info['education_info']     = $education_information;
            $info['experience_info']    = $experience_information;
            $info['project_info']       = $project_information;
            $info['skill_info']         = $skill_information;
            $info['language_info']      = $language_information;
            $info['interest_info']      = $interest_information;
        }

        return view('view', ['information' => $info]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $personal_info = new PersonalInformation();
        $personal_info->first_name        = $request->first_name;
        $personal_info->last_name         = $request->last_name;
        $personal_info->profile_title     = $request->profile_title;
        $personal_info->about_me          = $request->about_me;
        if ($request->file('image_path')) {
            $picture       = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
            $request->file('image_path')->move(public_path('assets/images/'), $picture);
        }
        $personal_info->image_path        = isset($picture) && !empty($picture) ? $picture : '';
        $personal_info->save();

        $personal_information = PersonalInformation::latest()->first();

        $contact_info = new ContactInformation();
        $contact_info->user_id          = $personal_information->id;
        $contact_info->email            = $request->email;
        $contact_info->phone_number     = $request->phone_number;
        $contact_info->website          = $request->website;
        $contact_info->linkedin_link    = $request->linkedin_link;
        $contact_info->github_link      = $request->github_link;
        $contact_info->twitter          = $request->twitter;
        $contact_info->save();


        $edu_count = count($request->degree_title);
        if ($edu_count != 0) {
            for ($i = 0; $i < $edu_count; $i++) {

                $education_info = new Education();
                $education_info->user_id                = $personal_information->id;
                $education_info->degree_title           = $request->degree_title[$i];
                $education_info->institute              = $request->institute[$i];
                $education_info->edu_start_date         = $request->edu_start_date[$i];
                $education_info->edu_end_date           = $request->edu_end_date[$i];
                $education_info->education_description  = $request->education_description[$i];
                $education_info->save();
            }
        }


        $exp_count = count($request->job_title);
        if ($exp_count != 0) {
            for ($i = 0; $i < $exp_count; $i++) {

                $experience_info = new Experience();
                $experience_info->user_id          = $personal_information->id;
                $experience_info->job_title        = $request->job_title[$i];
                $experience_info->organization     = $request->organization[$i];
                $experience_info->job_start_date   = $request->job_start_date[$i];
                $experience_info->job_end_date     = $request->job_end_date[$i];
                $experience_info->job_description  = $request->job_description[$i];
                $experience_info->save();
            }
        }

        $project_count = count($request->project_title);
        if ($project_count != 0) {
            for ($i = 0; $i < $project_count; $i++) {

                $project_info = new Projects();
                $project_info->user_id              = $personal_information->id;
                $project_info->project_title        = $request->project_title[$i];
                $project_info->project_description  = $request->project_description[$i];
                $project_info->save();
            }
        }

        $skill_count = count($request->skill_name);
        if ($skill_count != 0) {
            for ($i = 0; $i < $skill_count; $i++) {

                $skill_info = new Skills();
                $skill_info->user_id           = $personal_information->id;
                $skill_info->skill_name        = $request->skill_name[$i];
                $skill_info->skill_percentage  = $request->skill_percentage[$i];
                $skill_info->save();
            }
        }

        $lang_count = count($request->language);
        if ($lang_count != 0) {
            for ($i = 0; $i < $lang_count; $i++) {

                $language_info = new Languages();
                $language_info->user_id         = $personal_information->id;
                $language_info->language        = $request->language[$i];
                $language_info->language_level  = $request->language_level[$i];
                $language_info->save();
            }
        }

        $interest_count = count($request->interest);
        if ($interest_count != 0) {
            for ($i = 0; $i < $interest_count; $i++) {

                $interest_info = new Interests();
                $interest_info->user_id         = $personal_information->id;
                $interest_info->interest        = $request->interest[$i];
                $interest_info->save();
            }
        }

        return redirect()->route('index')->withSuccess("User Profile created successfully");
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $personal_information       = PersonalInformation::find($id)->toArray();
            $contact_information        = ContactInformation::where('user_id', $id)->get()->toArray();
            $education_information      = Education::where('user_id', $id)->get()->toArray();
            $experience_information     = Experience::where('user_id', $id)->get()->toArray();
            $project_information        = Projects::where('user_id', $id)->get()->toArray();
            $skill_information          = Skills::where('user_id', $id)->get()->toArray();
            $language_information       = Languages::where('user_id', $id)->get()->toArray();
            $interest_information       = Interests::where('user_id', $id)->get()->toArray();

            $info['personal_info']      = $personal_information;
            $info['contact_info']       = $contact_information;
            $info['education_info']     = $education_information;
            $info['experience_info']    = $experience_information;
            $info['project_info']       = $project_information;
            $info['skill_info']         = $skill_information;
            $info['language_info']      = $language_information;
            $info['interest_info']      = $interest_information;

            return view('edit', ['information' => $info]);
        } else {
            return redirect()->back()->withErrors('Somthing went wrong');
        }
    }

    public function update(Request $request)
    {

        if ($request->verify == 1) {
            $id = $request->user_id;

            $personal_info = PersonalInformation::find($id);
            $personal_info->first_name        = $request->first_name;
            $personal_info->last_name         = $request->last_name;
            $personal_info->profile_title     = $request->profile_title;
            $personal_info->about_me          = $request->about_me;
            if ($request->file('image_path')) {
                $picture       = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
                $request->file('image_path')->move(public_path('assets/images/'), $picture);
            }
            if (!empty($request->file('image_path'))) {
                $personal_info->image_path        = isset($picture) && !empty($picture) ? $picture : '';
            }
            $personal_info->save();

            $contact_info = ContactInformation::where('user_id', $id)->get()->first();
            $contact_info->user_id          = $id;
            $contact_info->email            = $request->email;
            $contact_info->phone_number     = $request->phone_number;
            $contact_info->website          = $request->website;
            $contact_info->linkedin_link    = $request->linkedin_link;
            $contact_info->github_link      = $request->github_link;
            $contact_info->twitter          = $request->twitter;
            $contact_info->save();


            $education_info     = Education::where('user_id', $id)->get();
            $edu_count_local    = !empty($request->degree_title) ? count($request->degree_title) : 0;
            $edu_count_live     = count($education_info);

            $edu_count_live >= $edu_count_local ? $edu_count = $edu_count_live : $edu_count = $edu_count_local;

            if ($edu_count != 0) {
                for ($i = 0; $i < $edu_count; $i++) {

                    if ($edu_count_local > 0 && $edu_count_live <= 0) {

                        $edu_info = new Education();
                        $edu_info->user_id                = $id;
                        $edu_info->degree_title           = $request->degree_title[$i];
                        $edu_info->institute              = $request->institute[$i];
                        $edu_info->edu_start_date         = $request->edu_start_date[$i];
                        $edu_info->edu_end_date           = $request->edu_end_date[$i];
                        $edu_info->education_description  = $request->education_description[$i];
                        $edu_info->save();
                    } elseif ($edu_count_live > 0 && $edu_count_local <= 0) {

                        Education::find($education_info[$i]['id'])->delete();
                    } else {

                        $education_info[$i]->user_id                = $id;
                        $education_info[$i]->degree_title           = $request->degree_title[$i];
                        $education_info[$i]->institute              = $request->institute[$i];
                        $education_info[$i]->edu_start_date         = $request->edu_start_date[$i];
                        $education_info[$i]->edu_end_date           = $request->edu_end_date[$i];
                        $education_info[$i]->education_description  = $request->education_description[$i];
                        $education_info[$i]->save();
                    }

                    $edu_count_local--;
                    $edu_count_live--;
                }
            }



            $experience_info    = Experience::where('user_id', $id)->get();
            $exp_count_local    = !empty($request->job_title) ? count($request->job_title) : 0;
            $exp_count_live     = count($experience_info);

            $exp_count_live >= $exp_count_local ? $exp_count = $exp_count_live : $exp_count = $exp_count_local;

            if ($exp_count != 0) {
                for ($i = 0; $i < $exp_count; $i++) {

                    if ($exp_count_local > 0 && $exp_count_live <= 0) {

                        $exp_info = new Experience();
                        $exp_info->user_id          = $id;
                        $exp_info->job_title        = $request->job_title[$i];
                        $exp_info->organization     = $request->organization[$i];
                        $exp_info->job_start_date   = $request->job_start_date[$i];
                        $exp_info->job_end_date     = $request->job_end_date[$i];
                        $exp_info->job_description  = $request->job_description[$i];
                        $exp_info->save();
                    } elseif ($exp_count_live > 0 && $exp_count_local <= 0) {

                        Experience::find($experience_info[$i]['id'])->delete();
                    } else {
                        $experience_info[$i]->user_id          = $id;
                        $experience_info[$i]->job_title        = $request->job_title[$i];
                        $experience_info[$i]->organization     = $request->organization[$i];
                        $experience_info[$i]->job_start_date   = $request->job_start_date[$i];
                        $experience_info[$i]->job_end_date     = $request->job_end_date[$i];
                        $experience_info[$i]->job_description  = $request->job_description[$i];
                        $experience_info[$i]->save();
                    }

                    $exp_count_local--;
                    $exp_count_live--;
                }
            }



            $project_info           = Projects::where('user_id', $id)->get();
            $project_count_local    = !empty($request->project_title) ? count($request->project_title) : 0;
            $project_count_live     = count($project_info);

            $project_count_live >= $project_count_local ? $project_count = $project_count_live : $project_count = $project_count_local;

            if ($project_count != 0) {
                for ($i = 0; $i < $project_count; $i++) {

                    if ($project_count_local > 0 && $project_count_live <= 0) {

                        $pro_info = new Projects();
                        $pro_info->user_id              = $id;
                        $pro_info->project_title        = $request->project_title[$i];
                        $pro_info->project_description  = $request->project_description[$i];
                        $pro_info->save();
                    } elseif ($project_count_live > 0 && $project_count_local <= 0) {

                        Projects::find($project_info[$i]['id'])->delete();
                    } else {

                        $project_info[$i]->user_id              = $id;
                        $project_info[$i]->project_title        = $request->project_title[$i];
                        $project_info[$i]->project_description  = $request->project_description[$i];
                        $project_info[$i]->save();
                    }

                    $project_count_live--;
                    $project_count_local--;
                }
            }


            $skill_info           = Skills::where('user_id', $id)->get();
            $skill_count_local    = !empty($request->skill_name) ? count($request->skill_name) : 0;
            $skill_count_live     = count($skill_info);

            $skill_count_live >= $skill_count_local ? $skill_count = $skill_count_live : $skill_count = $skill_count_local;

            if ($skill_count != 0) {
                for ($i = 0; $i < $skill_count; $i++) {

                    if ($skill_count_local > 0 && $skill_count_live <= 0) {

                        $sk_info = new Skills();
                        $sk_info->user_id           = $id;
                        $sk_info->skill_name        = $request->skill_name[$i];
                        $sk_info->skill_percentage  = $request->skill_percentage[$i];
                        $sk_info->save();
                    } elseif ($skill_count_live > 0 && $skill_count_local <= 0) {

                        Skills::find($skill_info[$i]['id'])->delete();
                    } else {

                        $skill_info[$i]->user_id           = $id;
                        $skill_info[$i]->skill_name        = $request->skill_name[$i];
                        $skill_info[$i]->skill_percentage  = $request->skill_percentage[$i];
                        $skill_info[$i]->save();
                    }

                    $skill_count_live--;
                    $skill_count_local--;
                }
            }



            $language_info          = Languages::where('user_id', $id)->get();
            $lang_count_local       = !empty($request->language) ? count($request->language) : 0;
            $lang_count_live        = count($language_info);

            $lang_count_live >= $lang_count_local ? $lang_count = $lang_count_live : $lang_count = $lang_count_local;

            if ($lang_count != 0) {
                for ($i = 0; $i < $lang_count; $i++) {

                    if ($lang_count_local > 0 && $lang_count_live <= 0) {

                        $lang_info = new Languages();
                        $lang_info->user_id         = $id;
                        $lang_info->language        = $request->language[$i];
                        $lang_info->language_level  = $request->language_level[$i];
                        $lang_info->save();
                    } elseif ($lang_count_live > 0 && $lang_count_local <= 0) {

                        Languages::find($language_info[$i]['id'])->delete();
                    } else {

                        $language_info[$i]->user_id         = $id;
                        $language_info[$i]->language        = $request->language[$i];
                        $language_info[$i]->language_level  = $request->language_level[$i];
                        $language_info[$i]->save();
                    }

                    $lang_count_live--;
                    $lang_count_local--;
                }
            }


            $interest_info              = Interests::where('user_id', $id)->get();
            $interest_count_local       = !empty($request->interest) ? count($request->interest) : 0;
            $interest_count_live        = count($interest_info);

            $interest_count_live >= $interest_count_local ? $interest_count = $interest_count_live : $interest_count = $interest_count_local;

            if ($interest_count != 0) {
                for ($i = 0; $i < $interest_count; $i++) {

                    if ($interest_count_local > 0 && $interest_count_live <= 0) {

                        $int_info = new Interests();
                        $int_info->user_id         = $id;
                        $int_info->interest        = $request->interest[$i];
                        $int_info->save();
                    } elseif ($interest_count_live > 0 && $interest_count_local <= 0) {

                        Interests::find($interest_info[$i]['id'])->delete();
                    } else {

                        $interest_info[$i]->user_id         = $id;
                        $interest_info[$i]->interest        = $request->interest[$i];
                        $interest_info[$i]->save();
                    }

                    $interest_count_live--;
                    $interest_count_local--;
                }
            }
        }

        return redirect()->back()->withSuccess("User Profile updated successfully");
    }

    public function destroy($id)
    {

        if (!empty($id)) {

            PersonalInformation::find($id)->delete();
            ContactInformation::where('user_id', $id)->delete();
            Education::where('user_id', $id)->delete();
            Experience::where('user_id', $id)->delete();
            Projects::where('user_id', $id)->delete();
            Skills::where('user_id', $id)->delete();
            Languages::where('user_id', $id)->delete();
            Interests::where('user_id', $id)->delete();

            return redirect()->back()->withSuccess("User Profile deleted successfully");
        } else {

            return redirect()->back()->withSuccess("Something went wrong");
        }
    }
}
