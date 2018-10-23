<?php

class NotFoundController extends Controller
{
    public function index()
    {
        return $this->view('404', compact('url'));
    }
}
