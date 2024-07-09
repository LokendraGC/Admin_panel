<?php

namespace App\Enums;

class TemplateType
{
    const DEFAULT = 'default';
    const HOME = 'home';
    const BLOG = 'blog';
    const ABOUT = 'about';
    const CONTACT = 'contact';
    const TEAM = 'team';
    const WHY_US = 'why_us';
    const TESTIMONAIL = 'testimonial';
    const SERVICES = 'services';
    const MESSAGE_US = 'message_us';

    public static function toArray()
    {
        return
         [
            self::DEFAULT,
            self::HOME,
            self::BLOG,
            self::ABOUT,
            self::CONTACT,
            self::TEAM,
            self::WHY_US,
            self::TESTIMONAIL,
            self::SERVICES,
            self::MESSAGE_US,
         ];
    }

    public static function getKeyValuePairs()
    {
        $keyValuePairs = [];

        $keyValuePairs['Default'] = self::DEFAULT;
        $keyValuePairs['About Us'] = self::ABOUT;
        $keyValuePairs['Blog'] = self::BLOG;
        $keyValuePairs['Contact Us'] = self::CONTACT;
        $keyValuePairs['Home'] = self::HOME;
        $keyValuePairs['Team'] = self::TEAM;
        $keyValuePairs['Why Us'] = self::WHY_US;
        $keyValuePairs['TESTIMONAIL'] = self::TESTIMONAIL;
        $keyValuePairs['SERVICES'] = self::SERVICES;
        $keyValuePairs['MESSAGE_US'] = self::MESSAGE_US;

        return $keyValuePairs;
    }

}
