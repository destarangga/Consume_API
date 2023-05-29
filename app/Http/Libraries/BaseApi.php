<?php

namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;

class BaseApi
{
    protected $baseUrl;
    //constructor : menyiapkan isi data, dijalankan otomatis tanpa dipanggil
    public function __construct()
    {
        //var $baseUrl yg diatas diisi nilainya dari isian file .env bagian API_HOST
        //var ini diisi otomatis ketika fila/class BaseApi dipanggil di controller
        $this->baseUrl = 'http://127.0.0.1:4444';
    }
    private function client()
    {
        //koneksikan ip dari var $baseUrl ke depedency Http
        //menggunakan depedency Http karna project API nya berbasis WEB ( protocol Http )
        return Http::baseUrl($this->baseUrl);
    }
    public function index(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function store(String $endpoint, Array $data = [])
    {
        return $this->client()->post($endpoint, $data);
    }

    public function edit(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function update(String $endpoint, Array $data = [])
    {
        return $this->client()->patch($endpoint, $data);
    }

    public function delete(String $endpoint, Array $data = [])
    {
        return $this->client()->delete($endpoint, $data);
    }

    public function trash(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }
    
    public function restore(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function permanent(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

}