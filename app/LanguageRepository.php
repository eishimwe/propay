<?php
/**
 * Created by PhpStorm.
 * User: Elie.Ishimwe
 * Date: 2018/04/11
 * Time: 8:30 AM
 */

namespace App;


class LanguageRepository
{

    protected $language;


    function __construct(Language $language)
    {
        $this->language = $language;
    }

    function save($data){

        $this->language->create($data);

    }

    function getLanguages(){

        return $this->language->latest()->get();

    }

    function getLanguageDropDown(){

        $languages = [];

        foreach ($this->getLanguages() as $language){

            $languages[$language->id] = $language->name;
        }

        return $languages;

    }

}