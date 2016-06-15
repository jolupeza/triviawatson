<?php
	/*
	|--------------------------------------------------------------------------
	| Template
	|--------------------------------------------------------------------------
	|
	| Template para el frontend de nuestra aplicación.
	|
	*/

    $theme = $this->config->item('front_theme');

    $this->load->view('themes/front/' . $theme . '/head');
    //$this->load->view('themes/front/' . $theme . '/header');
    //$this->load->view('themes/front/' . $theme . '/menu');
    $this->load->view($main_content);
    $this->load->view('themes/front/' . $theme . '/footer');