<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    // Pages ----------------------------------------------
    public function contact()
    {
        return $this->render('contact');
    }

    public function home()
    {
        $params = [
            'name' => "Adam"
        ];
        return $this->render('home', $params);
    }

    // Submissions ----------------------------------------
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }
}
?>