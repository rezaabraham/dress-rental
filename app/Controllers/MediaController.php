<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MediaController extends BaseController
{
    public function index()
    {
        //
    }

    public function show($folder = '', $fileName = '')
    {
        $filePath = 'assets/userdata/products/' . $folder . '/' . $fileName;

        if (!file_exists($filePath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("File not found.");
        }

        $mime = mime_content_type($filePath);
        $response = service('response');

        return $response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Length', filesize($filePath))
            ->setBody(file_get_contents($filePath));
    }
}
