<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePersonRequest;
use App\PersonRepository;
use App\LanguageRepository;
use App\InterestRepository;
use Log;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Http\Request;


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

        $person = $this->person->save($request->all());

        $this->dispatch(new SendWelcomeEmail($person));

        return redirect('/people')
            ->with('flash','Person has been created successfully!');


    }

    function people_list(){

        $people = $this->person->getPeople();

        return datatables()->of($people)
            ->addColumn('actions', '<form action="/people/{{ $id}}" method="POST"> {{ csrf_field() }} {{ method_field(\'DELETE\') }}<button type="submit" class="btn btn-link"> <i class="fa fa-trash"></i> </button></form><a href="/people/{{ $id}}/edit"><i class="fa fa-edit"></i></a>

                                     ')
            ->escapeColumns('')
            ->make(true);


    }

    function add_person_form(){

        $languages = $this->getLanguagesDropdownList();
        $interests = $this->getInterestsDropdownList();

        return view('people.add',compact('languages','interests'));
    }

    protected function getLanguagesDropdownList(){

        $language = new LanguageRepository;

        return $language->getLanguageDropDown();
    }

    protected function getInterestsDropdownList(){

        $interest = new InterestRepository;

        return $interest->getInterestDropDown();
    }

    public function destroy($id)
    {


        $person = $this->person->find($id);

        $person->interests()->delete();

        $person->delete();


        if(request()->wantsJson()){

            return response([],204);
        }

        return redirect('/people');

    }


    public function edit($id){

        $languages = $this->getLanguagesDropdownList();
        $interests = $this->getInterestsDropdownList();
        $person = $this->person->find($id);

        return view('people.edit',compact('person','languages','interests'));

    }

    public function update(Request $request){

        $this->person->edit($request);

        return redirect('/people');
    }






}
