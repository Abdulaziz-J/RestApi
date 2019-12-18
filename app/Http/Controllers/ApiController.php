<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Quote;

class ApiController extends Controller
{
    protected $quote;

    public function __construct(Quote $quote){
        $this->quote = $quote;
    }

    public function index(){
        print_r($this->quote->fetchQuote('ar'));
    }
}
