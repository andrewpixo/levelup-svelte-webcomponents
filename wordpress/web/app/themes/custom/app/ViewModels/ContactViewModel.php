<?php

namespace App\ViewModels;

use App\Utilities\Fields;

class ContactViewModel
{

    public static function createFromPost()
    {
        $model = new ContactViewModel();

        $model->phone = Fields::getField('contact_phone');
        $model->address = Fields::getField('contact_address');
        $model->email = Fields::getField('contact_email');
        $model->copyright = Fields::getField('contact_copyright');
        $model->facebookLink = Fields::getField('facebook_link');
        $model->flickrLink = Fields::getField('flickr_link');
        $model->linkedInLink = Fields::getField('linkedin_link');
        $model->twitterLink = Fields::getField('twitter_link');
        $model->instagramLink = Fields::getField('instagram_link');
        $model->youtubeLink = Fields::getField('youtube_link');

        return $model;
    }
}

