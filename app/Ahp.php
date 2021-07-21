<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class AHP extends Model
{
    public function create()
    {
      $ahp = new ahp;

      $ahp->id = Input::get('id');
      $ahp->distritc_name = Input::get('distritc_name');
      $ahp->population = Input::get('population');
      $ahp->reservoirs = Input::get('reservoirs');
      $ahp->landheigts = Input::get('histories');
      $ahp->total = Input::get('total');
      $ahp->save();

      return Redirect::back()
    }
}
