<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\File;
use Carbon\Carbon;
class FileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
      $files = File::query();

      if ($request->has('search')) {
          $search = $request->get('search');
          $files->where(function ($q) use ($search) {
              $q->orWhere('name', 'like', "%$search%")
              ->orWhere('hash', 'like', "%$search%");
          });
      }

      return view('admin.files.index', [
          'items' => $files->paginate(config('ui.admin.page_size')),
          'page' => $request->query('page')
      ]);
    }




    public function pdf_save_file(){
      $pdf = PDF::loadview('admin.pdf.testing', array('model' => array('hola' => 'mundo')));

      $path = storage_path('app/public').'/pdf-export-'.Carbon::parse(Carbon::now())->timestamp.'.pdf';

      file_put_contents($path, $pdf->output());
      $info = pathinfo($path);

      $file = File::create([
        'path' => $path,
        'name' => $info['basename'],
        'hash' => $info['basename'],
        'mime_type' => 'application/pdf',
        'extension' => $info['extension'],
        'size' => filesize($path),
      ]);

      return redirect()->route('admin::files.index')->with([
          'message' => "Se ha creado con exito el archivo ". $file->name,
          'level' => 'success'
      ]);

    }


    public function download(Request $request, $id) {

      $file = File::find($id);

      return response()
          ->download(storage_path('app/public').'/'.$file->name, $file->name)
          ->setAutoEtag();


    }


    public function pdf_response(){

      $pdf = PDF::loadview('admin.pdf.testing', array('model' => array('hola' => 'mundo')));
      return response($pdf->output(), 200)->header('Content-Type', 'application/pdf');


    }
}
