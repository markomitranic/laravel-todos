<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetodosRequest;
use App\Http\Requests\UpdatetodosRequest;
use App\Repositories\todosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class todosController extends AppBaseController
{
    /** @var  todosRepository */
    private $todosRepository;

    public function __construct(todosRepository $todosRepo)
    {
        $this->todosRepository = $todosRepo;
    }

    /**
     * Display a listing of the todos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->todosRepository->pushCriteria(new RequestCriteria($request));
        $todos = $this->todosRepository->all();

        return view('todos.index')
            ->with('todos', $todos);
    }

    /**
     * Show the form for creating a new todos.
     *
     * @return Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created todos in storage.
     *
     * @param CreatetodosRequest $request
     *
     * @return Response
     */
    public function store(CreatetodosRequest $request)
    {
        $input = $request->all();

        $todos = $this->todosRepository->create($input);

        Flash::success('Todos saved successfully.');

        return redirect(route('todos.index'));
    }

    /**
     * Display the specified todos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $todos = $this->todosRepository->findWithoutFail($id);

        if (empty($todos)) {
            Flash::error('Todos not found');

            return redirect(route('todos.index'));
        }

        return view('todos.show')->with('todos', $todos);
    }

    /**
     * Show the form for editing the specified todos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $todos = $this->todosRepository->findWithoutFail($id);

        if (empty($todos)) {
            Flash::error('Todos not found');

            return redirect(route('todos.index'));
        }

        return view('todos.edit')->with('todos', $todos);
    }

    /**
     * Update the specified todos in storage.
     *
     * @param  int              $id
     * @param UpdatetodosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetodosRequest $request)
    {
        $todos = $this->todosRepository->findWithoutFail($id);

        if (empty($todos)) {
            Flash::error('Todos not found');

            return redirect(route('todos.index'));
        }

        $todos = $this->todosRepository->update($request->all(), $id);

        Flash::success('Todos updated successfully.');

        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified todos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $todos = $this->todosRepository->findWithoutFail($id);

        if (empty($todos)) {
            Flash::error('Todos not found');

            return redirect(route('todos.index'));
        }

        $this->todosRepository->delete($id);

        Flash::success('Todos deleted successfully.');

        return redirect(route('todos.index'));
    }
}
