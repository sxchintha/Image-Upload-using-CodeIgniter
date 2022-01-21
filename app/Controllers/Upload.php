<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Upload extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('upload_form', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $fileName = $img->store(); // store the image and return the file name
            $title = $_POST['title'];

            $filepath = '' . $fileName;

            $data = ['uploaded_flleinfo' => new File($filepath)];

            // Save the title and file name in the database
            $db = db_connect();
            $db->query("insert into image(Title, FileName) values('$title', '$fileName');");
            $db->close();

            return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return view('upload_form', $data);
        }
    }
}
