<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePersonRequest;
use App\PersonRepository;
use App\LanguageRepository;
use App\InterestRepository;


class PersonController extends Controller
{

    protected $person;

    public function __construct(PersonRepository $person)
    {
        $this->middleware('auth');

        $this->person = $person;
    }


    public function index(){

        return view('people.list');

    }

    function store(storePersonRequest $request){

        $this->person->save($request->all());

        return redirect('/people')
            ->with('flash','Person has been created successfully!');


    }

    function people_list(){

        $people = $this->person->getPeople();

        return datatables()->of($people)
            ->addColumn('actions', '')
            ->make(true);


    }

    function add_person_form(LanguageRepository $language,InterestRepository $interest){

        $languages = $language->getLanguageDropDown();
        $interests = $interest->getInterestDropDown();

        return view('people.add',compact('languages','interests'));
    }






}
