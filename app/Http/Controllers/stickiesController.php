<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestickiesRequest;
use App\Http\Requests\UpdatestickiesRequest;
use App\Repositories\stickiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class stickiesController extends AppBaseController
{
    /** @var  stickiesRepository */
    private $stickiesRepository;

    public function __construct(stickiesRepository $stickiesRepo)
    {
        $this->stickiesRepository = $stickiesRepo;
    }

    /**
     * Display a listing of the stickies.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stickiesRepository->pushCriteria(new RequestCriteria($request));
        $stickies = $this->stickiesRepository->all();

        return view('stickies.index')
            ->with('stickies', $stickies);
    }

    /**
     * Show the form for creating a new stickies.
     *
     * @return Response
     */
    public function create()
    {
        return view('stickies.create');
    }

    /**
     * Store a newly created stickies in storage.
     *
     * @param CreatestickiesRequest $request
     *
     * @return Response
     */
    public function store(CreatestickiesRequest $request)
    {
        $input = $request->all();

        $stickies = $this->stickiesRepository->create($input);

        Flash::success('Stickies saved successfully.');

        return redirect(route('stickies.index'));
    }

    /**
     * Display the specified stickies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stickies = $this->stickiesRepository->findWithoutFail($id);

        if (empty($stickies)) {
            Flash::error('Stickies not found');

            return redirect(route('stickies.index'));
        }

        return view('stickies.show')->with('stickies', $stickies);
    }

    /**
     * Show the form for editing the specified stickies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stickies = $this->stickiesRepository->findWithoutFail($id);

        if (empty($stickies)) {
            Flash::error('Stickies not found');

            return redirect(route('stickies.index'));
        }

        return view('stickies.edit')->with('stickies', $stickies);
    }

    /**
     * Update the specified stickies in storage.
     *
     * @param  int              $id
     * @param UpdatestickiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestickiesRequest $request)
    {
        $stickies = $this->stickiesRepository->findWithoutFail($id);

        if (empty($stickies)) {
            Flash::error('Stickies not found');

            return redirect(route('stickies.index'));
        }

        $stickies = $this->stickiesRepository->update($request->all(), $id);

        Flash::success('Stickies updated successfully.');

        return redirect(route('stickies.index'));
    }

    /**
     * Remove the specified stickies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stickies = $this->stickiesRepository->findWithoutFail($id);

        if (empty($stickies)) {
            Flash::error('Stickies not found');

            return redirect(route('stickies.index'));
        }

        $this->stickiesRepository->delete($id);

        Flash::success('Stickies deleted successfully.');

        return redirect(route('stickies.index'));
    }
}
