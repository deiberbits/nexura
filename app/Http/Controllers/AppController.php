<?php

namespace App\Http\Controllers;

use App\Areas;
use App\Empleado;
use App\Roles;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    /**
     * Show list of Empleados
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        //Get list of Empleado
        $empleados = Empleado::all();
        return view('app', compact('empleados'));
    }


    /**
     * Create view of form to create Empleado
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        //Get list of Roles
        $roles = Roles::all();
        //Get list of Areas
        $areas = Areas::all();
        //Sexo
        $sexo = ['M' => 'Masculino', 'F' => 'Femenimo'];
        return view('create', compact('roles', 'areas', 'sexo'));
    }

    /**
     * Store new Empleado
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            //Get data from request
            $data = $request;
            //Validate data
            $this->validateForm($request);
            //Crear Empleado
            $empleado = new Empleado();
            //Save Empleado
            $this->save($data, $empleado);
            //Asignar Roles
            $empleado->roles()->attach($data['roles']);
            // Add success message
            $request->session()->flash('success', 'Empleado creado correctamente');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Add error message
            $request->session()->flash('error', 'Error al crear Empleado');
        }

        return redirect()->route('app');

    }

    /**
     * Validate Form
     */
    private function validateForm(Request $request, $id = null)
    {
        return $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:empleados,email,' . $id,
            'sexo' => 'required|string|max:1',
            'area' => 'required|integer',
            'boletin' => 'boolean',
            'description' => 'required|string',
            'roles' => 'required|array',
        ]);
    }

    /**
     * Save Empleado
     */
    private function save($data, Empleado $empleado)
    {
        $empleado->nombre = $data['name'];
        $empleado->email = $data['email'];
        $empleado->sexo = $data['sexo'];
        $empleado->areas_id = $data['area'];
        $empleado->descripcion = $data['description'];
        $empleado->boletin = $data['boletin'];
        $empleado->save();
        return $empleado;
    }

    /**
     * Edit Empleado view
     */
    public function edit($id)
    {
        //Get Empleado
        $empleado = Empleado::find($id);
        //Get list of Roles
        $roles = Roles::all();
        //Get list of Areas
        $areas = Areas::all();
        //Sexo
        $sexo = ['M' => 'Masculino', 'F' => 'Femenimo'];
        return view('edit', compact('empleado', 'roles', 'areas', 'sexo'));
    }

    /**
     * Update Empleado
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            //Get data from request
            $data = $request;
            //Validate data
            $this->validateForm($request, $id);
            //Update Empleado
            $empleado = Empleado::find($id);
            //Save Empleado
            $this->save($data, $empleado);
            //Update Roles
            $empleado->roles()->sync($data['roles']);
            // Add success message
            $request->session()->flash('success', 'Empleado actualizado correctamente');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Add error message
            $request->session()->flash('error', 'Error al actualizar Empleado');
        }

        return redirect()->route('app');
    }

    /**
     * Destroy Empleado
     */
    public function destroy($id)
    {
        //Delete Empleado
        $empleado = Empleado::find($id);
        $empleado->delete();
        // Add success message
        session()->flash('success', 'Empleado eliminado correctamente');
        return redirect()->route('app');
    }
}
