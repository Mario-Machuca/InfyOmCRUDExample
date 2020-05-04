<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutosRequest;
use App\Http\Requests\UpdateAutosRequest;
use App\Repositories\AutosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AutosController extends AppBaseController
{
    /** @var  AutosRepository */
    private $autosRepository;

    public function __construct(AutosRepository $autosRepo)
    {
        $this->autosRepository = $autosRepo;
    }

    /**
     * Display a listing of the Autos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $autos = $this->autosRepository->all();

        return view('autos.index')
            ->with('autos', $autos);
    }

    /**
     * Show the form for creating a new Autos.
     *
     * @return Response
     */
    public function create()
    {
        return view('autos.create');
    }

    /**
     * Store a newly created Autos in storage.
     *
     * @param CreateAutosRequest $request
     *
     * @return Response
     */
    public function store(CreateAutosRequest $request)
    {
        $input = $request->all();

        $autos = $this->autosRepository->create($input);

        Flash::success('Autos saved successfully.');

        return redirect(route('autos.index'));
    }

    /**
     * Display the specified Autos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $autos = $this->autosRepository->find($id);

        if (empty($autos)) {
            Flash::error('Autos not found');

            return redirect(route('autos.index'));
        }

        return view('autos.show')->with('autos', $autos);
    }

    /**
     * Show the form for editing the specified Autos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $autos = $this->autosRepository->find($id);

        if (empty($autos)) {
            Flash::error('Autos not found');

            return redirect(route('autos.index'));
        }

        return view('autos.edit')->with('autos', $autos);
    }

    /**
     * Update the specified Autos in storage.
     *
     * @param int $id
     * @param UpdateAutosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAutosRequest $request)
    {
        $autos = $this->autosRepository->find($id);

        if (empty($autos)) {
            Flash::error('Autos not found');

            return redirect(route('autos.index'));
        }

        $autos = $this->autosRepository->update($request->all(), $id);

        Flash::success('Autos updated successfully.');

        return redirect(route('autos.index'));
    }

    /**
     * Remove the specified Autos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $autos = $this->autosRepository->find($id);

        if (empty($autos)) {
            Flash::error('Autos not found');

            return redirect(route('autos.index'));
        }

        $this->autosRepository->delete($id);

        Flash::success('Autos deleted successfully.');

        return redirect(route('autos.index'));
    }
}
