<?php 

namespace App\Http\Controllers; 

use App\Models\Project; 
use App\Models\Task;
use App\Models\Comment; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Http; 

class ProjectTaskController extends Controller { 
    // Listar todos los proyectos 
    public function indexProjects() { 
        return response()->json(Project::with('tasks')->get()); 
    } 
    // Crear un nuevo proyecto 
    public function storeProject(Request $request) { 
        $request->validate([ 'name' => 'required|string|max:100' ]); 
        $project = Project::create($request->only('name')); 
        return response()->json($project, 201); 
    } 
    // Listar tareas de un proyecto 
    public function indexTasks($project_id) { 
        $project = Project::findOrFail($project_id); 
        return response()->json($project->tasks); 
    } 
    
    // Crear una nueva tarea 
    public function storeTask(Request $request) { 
        $request->validate([ 
            'name' => 'required|string|max:255', 
            'project_id' => 
            'required|exists:projects,id' 
        ]); 
        
        $task = Task::create($request->only('name', 'project_id')); 
        return response()->json($task, 201); 
    } 
    // Marcar tarea como completada (aquí mandamos notificación a Node) 
    public function completeTask($id) { 
        $task = Task::findOrFail($id); 
        $task->update(['completed' => true]); 
        // Simulación de envío a microservicio Node 
        Http::post('http://localhost:3000/event/completed', 
            [ 'task_id' => $task->id, 
            'project_id' => $task->project_id 
        ]); 
        return response()->json($task); 
    } 
    // Agregar comentario (opcional, si tienes tiempo) 
    public function storeComment(Request $request) { 
        $request->validate([ 
            'body' => 'required|string', 
            'task_id' => 'required|exists:tasks,id', 
            'user_id' => 'required|exists:users,id' 
        ]); 
        // Asumimos que tienes modelo Comment 
        $comment = \App\Models\Comment::create($request->all()); 
        return response()->json($comment, 201); 
    }
}