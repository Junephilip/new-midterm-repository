<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHealthTrackerRequest;
use App\Http\Requests\UpdateHealthTrackerRequest;
use App\Repositories\HealthTrackerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class HealthTrackerController extends AppBaseController
{
    /** @var  HealthTrackerRepository */
    private $healthTrackerRepository;

    public function __construct(HealthTrackerRepository $healthTrackerRepo)
    {
        $this->healthTrackerRepository = $healthTrackerRepo;
    }

    /**
     * Display a listing of the HealthTracker.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $healthTrackers = $this->healthTrackerRepository->all();

        return view('health_trackers.index')
            ->with('healthTrackers', $healthTrackers);
    }

    /**
     * Show the form for creating a new HealthTracker.
     *
     * @return Response
     */
    public function create()
    {
        return view('health_trackers.create');
    }

    /**
     * Store a newly created HealthTracker in storage.
     *
     * @param CreateHealthTrackerRequest $request
     *
     * @return Response
     */
    public function store(CreateHealthTrackerRequest $request)
    {
        $input = $request->all();

        $healthTracker = $this->healthTrackerRepository->create($input);

        Flash::success('Health Tracker saved successfully.');

        return redirect(route('healthTrackers.index'));
    }

    /**
     * Display the specified HealthTracker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $healthTracker = $this->healthTrackerRepository->find($id);

        if (empty($healthTracker)) {
            Flash::error('Health Tracker not found');

            return redirect(route('healthTrackers.index'));
        }

        return view('health_trackers.show')->with('healthTracker', $healthTracker);
    }

    /**
     * Show the form for editing the specified HealthTracker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $healthTracker = $this->healthTrackerRepository->find($id);

        if (empty($healthTracker)) {
            Flash::error('Health Tracker not found');

            return redirect(route('healthTrackers.index'));
        }

        return view('health_trackers.edit')->with('healthTracker', $healthTracker);
    }

    /**
     * Update the specified HealthTracker in storage.
     *
     * @param int $id
     * @param UpdateHealthTrackerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHealthTrackerRequest $request)
    {
        $healthTracker = $this->healthTrackerRepository->find($id);

        if (empty($healthTracker)) {
            Flash::error('Health Tracker not found');

            return redirect(route('healthTrackers.index'));
        }

        $healthTracker = $this->healthTrackerRepository->update($request->all(), $id);

        Flash::success('Health Tracker updated successfully.');

        return redirect(route('healthTrackers.index'));
    }

    /**
     * Remove the specified HealthTracker from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $healthTracker = $this->healthTrackerRepository->find($id);

        if (empty($healthTracker)) {
            Flash::error('Health Tracker not found');

            return redirect(route('healthTrackers.index'));
        }

        $this->healthTrackerRepository->delete($id);

        Flash::success('Health Tracker deleted successfully.');

        return redirect(route('healthTrackers.index'));
    }
}
