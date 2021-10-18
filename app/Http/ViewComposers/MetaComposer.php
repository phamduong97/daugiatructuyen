<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

class MetaComposer
{
    public function compose(View $view)
    {
      
        if(request()->segment(5) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(4)));
        }else if(request()->segment(3) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(3)));
        }else if(request()->segment(2) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(2)));
        }else if(request()->segment(1) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(1)));
        }

        if(isset($metaTitle)){
            $view->with('metaTitle', $metaTitle);
        }
    }
}