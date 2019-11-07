<?php

namespace Sukohi\FormRequestAppendable;

use Illuminate\Support\Str;

trait FormRequestAppendable {

    public function all($keys = null) {

        $results = parent::all($keys);

        if(property_exists($this, 'appends')) {

            foreach($this->appends as $append) {

                $method = Str::camel('get_'. $append .'_attribute');

                if(method_exists($this, $method)) {

                    $results[$append] = $this->{$method}($results);

                }

            }

        }

        return $results;

    }

}
