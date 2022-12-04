<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Services\AttendanceService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('uploaded_file');
        if($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $this->verifyFile($extension, $fileSize);

            $location = 'public/data/attendance';
            $filename = time() . '-' .$filename;
            $file->storeAs($location, $filename);            
            $filepath = "../storage/app/$location/". $filename;
            
            $fileType = IOFactory::identify($filepath);
            $reader = IOFactory::createReader($fileType);
            $spreadsheet = $reader->load($filepath);
            unlink($filepath);
            
            $importData = $spreadsheet->getActiveSheet()->toArray();

            $j = 0;
            foreach ($importData as $data) {
                if($j == 0) {
                    $j++;
                    continue;
                }

                $checkin = Carbon::parse($data[2] ?? '00:00:00');
                $checkout = Carbon::parse($data[3] ?? '00:00:00');

                $j++;
                try {
                    DB::beginTransaction();
                    
                    Attendance::create([
                        'schedule_id' => $data[0],
                        'emp_id' => $data[1],
                        'checkin_at' => $checkin,
                        'checkout_at' => $checkout,
                        'worked_hours' => $checkin->floatDiffInHours($checkout)
                    ]);
    
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }

            return response()->json([ 'message' => --$j." records have successfully uploaded" ]);
        } else {
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }

    
    private function verifyFile($extension, $fileSize)
    {
        $valid_extension = array("xls", "csv", "xlsx"); // Only want csv and excel files
        $maxFileSize = 2097152; // File size limit

        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize > $maxFileSize) throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE);
        } else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
