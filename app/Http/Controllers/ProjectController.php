<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function addProject()
    {
        return view('panel.project.addProject');
    }

    public function list()
    {
        $projects = Project::paginate(10);
        return view('panel.project.list', compact('projects'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('create', Project::class)) {
            $count = count($request->all());
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'abstract' => ['string', 'max:255'],
                'description' => ['required', 'string', 'max:10000  '],
            ]);
            $category = ($request->projectCategory) ? $request->projectCategory : null;
            $slut = str_replace(' ','-',$request->title);
            $project = Project::create([
                'title' => $request->title,
                'slut' => $slut,
                'description' => $request->description,
                'category' => $category,
                'abstract' => ($request->abstract) ? $request->abstract : null,
            ]);

            for ($i = 1; $i < $count; $i++) {
                $x = "image" . $i;
                $y = "video" . $i;
                $image = $request->$x;
                $video = $request->$y;
                if (!empty($image)) {
                    $file = $request->file('image' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('images/projects', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into projects_gallery (project_id, image , created_at, updated_at) values (?, ?, ?, ?)', [$project->id, $file_name, $time, $time]);
                }
                if (!empty($video)) {
                    $file1 = $request->file('video' . $i);
                    $base_name1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext1 = $file1->getClientOriginalExtension(); // png
                    $file_name1 = $base_name1 . $i . '_' . time() . '.' . $ext1;
                    $file1->storeAs('videos/projects', $file_name1, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into projects_gallery (project_id, video, created_at, updated_at) values (?, ?, ?, ?)', [$project->id, $file_name1, $time, $time]);
                }
            }
            $request->session()->flash('status', 'پروژه اجرایی با موفقیت بارگزاری شد!');
            return redirect()->back();
        } else {
            abort('403', 'متاسفانه شما دسترسی ندارید');
        }
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if (auth()->user()->can('delete', $project)) {
            if ($project) {
                Project::destroy($id);
            }
            session()->flash('status', 'پروژه اجرایی با موفقیت حذف شد');
            return back();
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $images = $project->images();
        $videos = $project->videos();
        return view('panel.project.edit', compact('project', 'images', 'videos'));
    }

    public function storeEdit(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $count = count($request->all());
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['string', 'max:255'],
            'description' => ['required', 'string', 'max:10000  '],
        ]);
        if (auth()->user()->can('update', $project)) {
            $slut = str_replace(' ','-',$request->title);
            $project->update([
                'slut' => $slut,
            ]);
            if ($project->title != $request->title) {
                $project->update([
                    'title' => $request->title,
                ]);
            } elseif ($project->description != $request->description) {
                $project->update([
                    'description' => $request->description,
                ]);
            } elseif ($project->abstract != $request->abstract) {
                $project->update([
                    'abstract' => $request->abstract,
                ]);
            }
            for ($i = 1; $i < $count; $i++) {
                $x = "image" . $i;
                $y = "video" . $i;
                $image = $request->$x;
                $video = $request->$y;
                if (!empty($image)) {
                    $file = $request->file('image' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('images/projects', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into projects_gallery (project_id, image , created_at, updated_at) values (?, ?, ?, ?)', [$project->id, $file_name, $time, $time]);
                }
                if (!empty($video)) {
                    $file1 = $request->file('video' . $i);
                    $base_name1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext1 = $file1->getClientOriginalExtension(); // png
                    $file_name1 = $base_name1 . $i . '_' . time() . '.' . $ext1;
                    $file1->storeAs('videos/projects', $file_name1, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into projects_gallery (project_id, video, created_at, updated_at) values (?, ?, ?, ?)', [$project->id, $file_name1, $time, $time]);
                }
            }
            $request->session()->flash('status', 'پروژه اجرایی با موفقیت ویرایش شد!');
            return redirect()->back();
        } else {
            abort('403', 'متاسفانه شما دسترسی ندارید');
        }
    }


    public function projectImageStoreEdit(Request $request, $id)
    {
        if (auth()->user()->can('create', Project::class)) {
            $image = DB::table('projects_gallery')->where('id', '=', $id)->first();
            if (empty($image)) {
                $request->session()->flash('error', 'عکس مورد نظر یافت نشد.');
            } else {
                if (empty($request->image)) {
                    DB::table('projects_gallery')->where('id', '=', $id)
                        ->delete();
                    $request->session()->flash('status', 'عکس مورد نظر با موفقیت حذف شد.');
                } else {
                    $request->validate([
                        'image' => ['image'],
                    ]);

                    $file = $request->file('image');

                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . '_' . time() . '.' . $ext;
                    $file->storeAs('images/project', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::table('projects_gallery')->where('id', '=', $id)
                        ->update(['image' => $file_name, 'updated_at' => $time]);
                    $request->session()->flash('status', 'عکس مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function projectVideoStoreEdit (Request $request, $id)
    {
        if (auth()->user()->can('create', Project::class)) {
            $video = DB::table('projects_gallery')->where('id', '=', $id)->first();
            if (empty($video)) {
                $request->session()->flash('error', 'ویدئو مورد نظر یافت نشد.');
            } else {
                if (empty($request->video)) {
                    DB::table('projects_gallery')->where('id', '=', $id)
                        ->delete();
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت حذف شد.');
                } else {
                    $request->validate([
                        'video' => ['video'],
                    ]);

                    $file = $request->file('video');
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . '_' . time() . '.' . $ext;
                    $file->storeAs('videos/projects', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::table('projects_gallery')->where('id', '=', $id)
                        ->update(['video' => $file_name, 'updated_at' => $time]);
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function single($id)
    {
        $project = Project::findOrFail($id);
        $images = $project->images();
        $videos = $project->videos();
        return view('site.project.single', compact('project', 'images', 'videos'));

    }


    public function all()
    {
        $projects = Project::paginate(18);
        return view('site.project.all', compact('projects'));
    }
}

