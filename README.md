# FormRequestAppendable
A Laravel package that allows you to append values to FormRequest.  
This package is maintained under Laravel 5.7.

# Installation

    composer require sukohi/form-request-appendable:1.*

# Preparation

First, you need to make your own FormRequest file by artisan command like the bellow.

    php artisan make:request TestRequest

And set `FormRequestAppendable` there.

    <?php
    
    namespace App\Http\Requests;
    
    use Illuminate\Foundation\Http\FormRequest;
    use Sukohi\FormRequestAppendable\FormRequestAppendable;
    
    class TestRequest extends FormRequest
    {
        use FormRequestAppendable;
        protected $appends = ['time'];
    
        // Something ...
    
        // Accessor
        public function getTimeAttribute($values) {
    
            return $values['hours'] .':'. $values['minutes'];
    
        }
    }
    
Now you have a value called `time` that contains `hours` and `minutes` in FormRequest.

# Usage

You can use the values as if they originally exist.

***in FormRequest***

    public function rules()
    {
        return [
            'time' => 'required|date_format:H:i',
        ];
    }

***in Controller***

    public function index(TestRequest $request) {

        echo $request->time;

    }

# License

This package is licensed under the MIT License.

Copyright 2019 Sukohi Kuhoh
