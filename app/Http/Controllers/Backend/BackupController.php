<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::authorize('app.backup-index');
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);  //local
        $files = $disk->files(config('backup.backup.name')); //env(APP_NAME)

        $backups = [];
        // Make an array of backup files with their filesize and creation date.
        foreach ($files as $key => $file) {
            // only take the .zip file
            if(substr($file, -4) == '.zip' && $disk->exists($file)){
                $file_name = str_replace(config('backup.backup.name') . '/', '', $file);
                $backups[]=[
                    'file_path' => $file,
                    'file_name' => $file_name,
                    'file_size' => $this->byteToHuman($disk->size($file)),
                    'created_at' => Carbon::parse($disk->lastModified($file))->diffForHumans(),
                    'download_link' => '#',
                ];
            }
        }

        // reverse the backups, so that newest one would be on top
        $backups = array_reverse($backups);

        return view('dashboard.Backups.index', compact('backups'));
    }

    /*
    * Convert bytes to human readable
    * @param $bytes
    * @return string
    */
    private function byteToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for($i=0;$bytes>1024; $i++){
            $bytes/=1024;
        }

        return round($bytes, 2).' '.$units[$i];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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