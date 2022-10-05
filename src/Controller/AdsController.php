<?php

declare(strict_types=1);

namespace Andrejus\AdsWebsiteAuto\Controller;


class AdsController extends Controller
{
    public function showList():void
    {
    $data = json_decode(file_get_contents('./data/ads.json'), true);
    $this->render('./view/ads/list.php',$data);

    }
    public function showCreateAds():void
    {
        $this->render('./view/ads/create.php');
    }

    public function handleCreateAds():void
    {
        $ads = json_decode(file_get_contents('./data/ads.json'), true);


        $newAd = [
            'user_id' => $_SESSION['user_id'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'city' => $_POST['city'],
            'phone_number' => $_POST['phone_number'],
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => null,
        ];

        $ads[] = $newAd;
        file_put_contents('./data/ads.json', json_encode($ads, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT));

        header('Location: /ads/list');
}


}