<?php

namespace app\controllers;

use thecodeholic\phpmvc\Controller;

/**
 * Class AboutController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}