<?php
namespace App\Repositories\Interfaces\Admin;

interface RewardSystemInterface{
    public function setRewardBy($request);

    public function paginate($limit);

    public function all();

    public function byUser($id, $limit);

    public function rewardUser($limit);

    public function convertReward($data);

    public function rewardHistory();

}
