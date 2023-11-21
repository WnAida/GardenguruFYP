<?php

namespace App\Helpers;

use App\Enums\EventActionEnum;
use App\Enums\ProductCategoryEnum;
use App\Enums\RelationshipEnum;
use App\Enums\ScheduleStageEnum;
use App\Enums\UserExpertiseEnum;

class EnumMap{

    public static function getUserExpertise(){
        return [
            UserExpertiseEnum::Beginner()->value => UserExpertiseEnum::Beginner()->label,
            UserExpertiseEnum::Intermediate()->value => UserExpertiseEnum::Intermediate()->label,
            UserExpertiseEnum::Expert()->value => UserExpertiseEnum::Expert()->label,
        ];
    }

    public static function getScheduleStage(){
        return [
            ScheduleStageEnum::Seedling()->value => ScheduleStageEnum::Seedling()->label,
            ScheduleStageEnum::Planted()->value => ScheduleStageEnum::Planted()->label,
            ScheduleStageEnum::Sprout()->value => ScheduleStageEnum::Sprout()->label,
            ScheduleStageEnum::Flowering()->value => ScheduleStageEnum::Flowering()->label,
            ScheduleStageEnum::Ripening()->value => ScheduleStageEnum::Ripening()->label,
            ScheduleStageEnum::Harvested()->value => ScheduleStageEnum::Harvested()->label,
        ];
    }

    public static function getEventAction(){
        return [
            EventActionEnum::Water()->value => EventActionEnum::Water()->label,
            EventActionEnum::Repellent()->value => EventActionEnum::Repellent()->label,
            EventActionEnum::Trim()->value => EventActionEnum::Trim()->label,
            EventActionEnum::Fertilize()->value => EventActionEnum::Fertilize()->label,
        ];
    }

    public static function getProductCategory(){
        return [
            ProductCategoryEnum::Seed()->value =>  ProductCategoryEnum::Seed()->label,
            ProductCategoryEnum::Fertilizer()->value =>  ProductCategoryEnum::Fertilizer()->label,
        ];
    }
}
