<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mengambil data dari input search
        $search = $request->search;
        //memanggil libraries BaseApi method nya index dengan mengirim parameter1 berupa path data dari API nya, parameter2 data untuk mengisi search_nama API nya
        $data = (new BaseApi)->index('/api/students', ['search_nama' => $search]);
        $students = $data->json();
        // dd($students);
        return view ('index')->with(['students' => $students ['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];
        $proses = (new BaseApi)->store('/api/students/tambah-data', $data);
        ($proses);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil Menambahkan data baru ke students API');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = (new BaseApi)->edit('/api/students/' .$id);
        if ($data->failed()){
            $errors = $data->json(['data']);
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            $student = $data->json('data');
            return view('edit')->with(['student' => $student]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $payload =[
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];

        $proses = (new BaseApi)->update('/api/students/update/' .$id, $payload);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors'=> $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil mengubah data siswa ddari API');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proses = (new BaseApi)->delete('/api/students/delete/' .$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors'=> $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil hapus data sementara dari API');
        }
    }

    public function trash()
    {
        $proses = (new BaseApi)->trash('/api/students/show/trash');
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            $studentsTrash =
            $proses->json('data');
            return view('trash')->with(['studentsTrash' => $studentsTrash]);
        }
    }

    public function permanent($id)
    {
        $proses = (new BaseApi)->permanent('/api/students/trash/delete/permanent/' .$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors'=> $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil hapus data secara permanent');
        }
    }
    
    public function restore($id)
    {
        $proses = (new BaseApi)->restore('/api/students/trash/restore/' .$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors'=> $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil mengembalikan data dari sampah');
        }
    }
}
