<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matkul;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ScheduleMatkul;
use App\Models\ClassModel;
use App\Models\ScheduleMatkulClass;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', [
            'schedules' => $schedules,
            'users' => User::all(),
        ]);
    }

    public function show(Schedule $schedule)
    {
        $schedule = $schedule
            ->load('user')
            ->load('matkuls');

        $matkuls = Matkul::get();
        return view('schedule.detail', compact('schedule', 'matkuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|',
            'tahun_akademik' => 'required|string',
        ]);

        $schedule = Schedule::create($request->all());

        return redirect(route('schedule.index'))->with('success', 'Data Schedule berhasil ditambahkan!');

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

        $schedule->update($request->all());

        // return response()->json(['data' => $schedule]);

        return redirect(route('schedule.index'))->with('success', 'Data Schedule berhasil diubah!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $schedule->delete();

        // return response()->json(['message' => 'Schedule deleted']);

        return redirect(route('schedule.index'))->with('success', 'Data Schedule berhasil dihapus!');
    }

    // <-- Schedule Matkul -->

    function showScheduleMatkul(Schedule $schedule, ScheduleMatkul $scheduleMatkul)
    {
        $scheduleMatkul = $scheduleMatkul->load('classes');
        $class = ClassModel::all();

        return view('schedule.detail-class', compact('schedule', 'scheduleMatkul', 'class'));
    }

    function createScheduleMatkul(Schedule $schedule, Request $request)
    {
        $request->validate([
            'matkul_ids' => 'required|array|',
        ]);

        DB::transaction(function () use ($schedule, $request) {
            foreach ($request->matkul_ids as $matkul_id) {
                /**
                 * @todo: check is matkul exists
                 */
                $matkul = Matkul::find($matkul_id);
                if (!$matkul) {
                    return response()->json(['message' => 'Matkul with id ' . $matkul_id . ' not found'], 404);
                }
                // dd($request->matkul_ids);

                /**
                 * @todo: check is matkul already added on schedule
                 */
                $scheduleMatkul = ScheduleMatkul::query()
                    ->where('schedule_id', $schedule->id)
                    ->where('matkul_id', $matkul_id)
                    ->first();
                // dd($scheduleMatkul, $schedule->id, $matkul_id);
                if ($scheduleMatkul) {
                    continue;
                }

                /**
                 * @todo: create schedule matkul
                 */
                ScheduleMatkul::create([
                    'schedule_id' => $schedule->id,
                    'matkul_id' => $matkul_id
                ]);
            }
        });

        return redirect()->back()->with('success', 'Matkul successfully added');
    }

    function deleteScheduleMatkul(Schedule $schedule, ScheduleMatkul $scheduleMatkul)
    {
        $scheduleMatkul->delete();
        return redirect()->back();
    }

    // <-- Schedule Matkul Class -->
    function createScheduleMatkulClass(Schedule $schedule, ScheduleMatkul $scheduleMatkul, Request $request)
    {
        $request->validate([
            'class_id' => 'required|string|',
            'sks' => 'required|integer|',
            'hari' => 'required|string|',
            'start_time' => 'required|string|',
            'end_time' => 'required|string|',
            'ruangan' => 'required|string|',
        ]);

        // dd($request->all());

        /**
         * @todo: check is class exists
         */
        $class = ClassModel::find($request->class_id);
        if (!$class) {
            return response()->json(['message' => 'Class with id ' . $request->class_id . ' not found'], 404);
        }

        /**
         * @todo: check is matkul already added on schedule
         */
        $scheduleMatkulClass = ScheduleMatkulClass::query()
            ->where('schedule_matkul_id', $scheduleMatkul->id)
            ->where('class_id', $class->id)
            ->first();

        if (!$scheduleMatkulClass) {
            ScheduleMatkulClass::create([
                'schedule_matkul_id' => $scheduleMatkul->id,
                'class_id' => $request->class_id,
                'sks' => $request->sks,
                'hari' => $request->hari,
                'jam' => $request->start_time . ' s.d ' . $request->end_time,
                'ruangan' => $request->ruangan
            ]);
        }

        return redirect()->back()->with('success', 'Matkul successfully added');
    }
}
