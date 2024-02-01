<?php
    namespace App\Http\Controllers\Page;

    use App\Http\Controllers\Controller;

    class FrontpageController extends Controller
    {
        public function __invoke() {
            return view('page.front');
        }
    }
