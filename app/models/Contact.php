<?php

class Contact extends Eloquent {
	protected $guarded = array();

	public static $rules = array(       
            'email'     => 'Required|Email',
            'name'     => 'Required|Max:255',
            'message'     => 'Required',
        );
        
        public static function boot ()
        {
            static::saving(function ($model)
            {
                $rules = Contact::$rules;
             
                $validator = Validator::make($model->toArray(), $rules)->passes();
                /*var_dump($validator);
                die();*/
                return $validator;
            });
        }
}
