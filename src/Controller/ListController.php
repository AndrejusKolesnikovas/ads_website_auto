<?php

declare(strict_types=1);

namespace Andrejus\AdsWebsiteAuto\Controller;


class ListController extends Controller
{
    public function showList():void
    {
    $data = json_decode(file_get_contents('./data/ads.json'), true);
    $this->render('./view/list.php',$data);

    }

}