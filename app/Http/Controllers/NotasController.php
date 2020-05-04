<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotasRequest;
use App\Http\Requests\UpdateNotasRequest;
use App\Repositories\NotasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NotasController extends AppBaseController
{
    /** @var  NotasRepository */
    private $notasRepository;

    public function __construct(NotasRepository $notasRepo)
    {
        $this->notasRepository = $notasRepo;
    }

    /**
     * Display a listing of the Notas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $notas = $this->notasRepository->all();

        return view('notas.index')
            ->with('notas', $notas);
    }

    /**
     * Show the form for creating a new Notas.
     *
     * @return Response
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created Notas in storage.
     *
     * @param CreateNotasRequest $request
     *
     * @return Response
     */
    public function store(CreateNotasRequest $request)
    {
        $input = $request->all();

        $notas = $this->notasRepository->create($input);

        Flash::success('Notas saved successfully.');

        return redirect(route('notas.index'));
    }

    /**
     * Display the specified Notas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notas = $this->notasRepository->find($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        return view('notas.show')->with('notas', $notas);
    }

    /**
     * Show the form for editing the specified Notas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notas = $this->notasRepository->find($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        return view('notas.edit')->with('notas', $notas);
    }

    /**
     * Update the specified Notas in storage.
     *
     * @param int $id
     * @param UpdateNotasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotasRequest $request)
    {
        $notas = $this->notasRepository->find($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        $notas = $this->notasRepository->update($request->all(), $id);

        Flash::success('Notas updated successfully.');

        return redirect(route('notas.index'));
    }

    /**
     * Remove the specified Notas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notas = $this->notasRepository->find($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        $this->notasRepository->delete($id);

        Flash::success('Notas deleted successfully.');

        return redirect(route('notas.index'));
    }
}
