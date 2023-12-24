<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Schedule;
use App\Models\ScheduleMatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', [
            'schedules' => $schedules
        ]);
    }

    public function show(Schedule $schedule)
    {
        $schedule = $schedule
            ->with('user', 'matkuls')
            ->first();

        return view('schedule.detail', compact('schedule'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|',
            'tahun_akademik' => 'required|string',
        ]);

        $schedule = Schedule::create($request->all());

        return response()->json(['data' => $schedule], 201);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $request->validate([
            'user_id' => 'required|string|',
            'tahun_akademik' => 'required|string',
        ]);

        $matkul->update($request->all());

        return response()->json(['data' => $matkul]);
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $schedule->delete();

        return response()->json(['message' => 'Schedule deleted']);
    }

    // <-- Schedule Matkul -->
    function createScheduleMatkul(Schedule $schedule, Request $request)
    {
        /**
         * validate
         */
        $request->validate([
            'matkul_ids' => 'required|array|',
        ]);

        $scheduleMatkul = DB::transaction(function () use ($schedule, $request) {
            foreach ($request->matkul_ids as $i => $matkul_id) {
                /**
                 * @todo: check is matkul exists
                 */
                $matkul = Matkul::find($matkul_id);
                if (!$matkul) {
                    return response()->json(['message' => 'Matkul with id ' . $matkul_id . ' not found'], 404);
                }

                /**
                 * @todo: check is matkul already added on schedule
                 */
                $scheduleMatkul = ScheduleMatkul::query()
                    ->where('schedule_id', $schedule->id)
                    ->where('matkul_id', $matkul_id)
                    ->exists();
                if ($scheduleMatkul) {
                    continue;
                }

                /**
                 * @todo: create schedule matkul
                 */
                $scheduleMatkul = ScheduleMatkul::create([
                    'schedule_id' => $schedule->id,
                    'matkul_id' => $matkul_id
                ]);
                return $scheduleMatkul;
            }
        });

        return response()->json(['message' => 'Matkul successfully added']);
    }

    function deleteScheduleMatkul(Schedule $schedule, ScheduleMatkul $scheduleMatkul)
    {
        dd($schedule, $scheduleMatkul);
        return response()->json(['message' => 'Schedule Matkul successfully delete']);
    }

}
