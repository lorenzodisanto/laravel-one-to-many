<?php
// cambio in namespace
namespace App\Http\Controllers\Admin;
// importo il controller
use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\StoreProjectRequest;
use App\Http\Requests\Auth\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

// importo facades string
use Illuminate\Support\Str;

// importo il validator
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recupero la lista dei progetti dal database
        $projects = Project::orderBy('id',"DESC")->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // prendo i types da passare alla vista
        $types = Type::all();
        // ritorno il form aggiungi nuovo progetto
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {   
        // validazione richiesta
        $request->validated();

        //salvataggio progetto inserito nel form
        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();

        // ritorno al dettaglio del progetto dopo il salvataggio
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        //metodo show per dettaglio singolo progetto
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        // prendo i types da passare alla vista
        $types = Type::all();
        //ritorno la vista del form di modifica
        return view('admin.projects.edit', compact('project','types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {   
        // validazione richiesta
        $request->validated();
        
        // salvataggio modifica
        $data = $request->all();
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();

        // dopo il salvataggio redirect alla rotta show
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        // cancello progetto
        $project->delete();
        // ritorno alla lista 
        return redirect()->route('admin.projects.index');
    }

    // // metodo privato per la LOGICA DI VALIDAZIONE
    // private function validation($data) {

    //     // metodo make del validator
    //     $validator = Validator::make(
    //         $data,
    //         [
    //           'title'=> 'required|string|max:150',
    //           'link'=> 'required|url',
    //           'description'=> 'required|string' 
    //         ],
    //         [
    //           'title.required'=> 'Il titolo è obbligatorio',
    //           'title.string'=> 'Il titolo deve essere una stringa',
    //           'title.max'=> 'Il titolo deve avere massimo 150 caratteri',

    //           'link.required'=> 'Il link è obbligatorio',
    //           'link.url'=> 'Il link deve essere un URL',

    //           'description.required'=> 'La descrizione è obbligatoria',
    //           'description.string'=> 'La descrizione deve essere una stringa',
    //         ]
    //       )->validate();

    //       return $validator;
    // }
}
