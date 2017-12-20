<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Userstest extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    
    public function generateToken(){
        $this->api_token =  str_random(60);
        $this->save();
        
        return $this->api_token;
    }
}
