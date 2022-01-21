<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ViewImages extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $data = ['result' => $db->query("select * from image;")];
        $db->close();
        return view('view_images', $data);
    }
}
