<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Créez une nouvelle instance de contrôleur.
     *
     * @retour nul
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Afficher le tableau de bord de l'application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Afficher le tableau de bord de l'application pour les administrateurs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * Afficher le tableau de bord de l'application pour les gestionnaires.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
