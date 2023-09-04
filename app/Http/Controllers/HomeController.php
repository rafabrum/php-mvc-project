<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Services\PersonService;

class HomeController extends Controller
{
    private $service;

    public function __construct(PersonService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**0
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $persons = [];
        $notFound = false;

        if (array_key_exists('nis', $request->all())) {
            $persons = $this->service->getPerson($request->get('nis'));
            $notFound = empty($persons) ? true : $notFound;
        }
        $this->render('home', [
            'persons' => [$persons],
            'notFound' => $notFound
        ]);
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $nis = $this->service->storePerson($data);
        $this->render('success-store', [
            'nis' => $nis['nis'],
        ]);
    }
}