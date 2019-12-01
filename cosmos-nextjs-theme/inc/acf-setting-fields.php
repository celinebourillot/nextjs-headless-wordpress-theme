<?php

$links = new StoutLogic\AcfBuilder\FieldsBuilder('links');
$links
    ->addText('label')
    ->addRelationship('page_url', ['max' => '1', 'return_format' => 'object']);

$column = new StoutLogic\AcfBuilder\FieldsBuilder('column');
$column
    ->addText('title')
    ->addWysiwyg('content')
    ->addRepeater('Links', [
        'min' => 0,
        'max' => 10,
        'button_label' => 'Add Link',
        'layout' => 'block',
    ])
        ->addFields($links)
    ->endRepeater();

$general = new StoutLogic\AcfBuilder\FieldsBuilder('settings');
$general

->addTab('General')
    ->addImage('main_logo')
    ->addImage('secondary_logo')
    ->addImage('favicon')
    ->addText('default_meta_description')
    ->addImage('default_meta_image')
    ->addTextarea('header_code')
    ->addText('domain')

->addTab('Social')
    ->addUrl('twitter')
    ->addUrl('instagram')
    ->addUrl('linkedin')
    ->addUrl('facebook')
    ->addUrl('dribbble')

->addTab('Header')
    ->addText('label')
    ->addImage('icon')
    ->addSelect('link_type')
        ->addChoice('external', 'External')
        ->addChoice('internal', 'Internal')
        ->setDefaultValue('internal')
    ->addUrl('link_url')
        ->conditional('link_type', '==', 'external')
    ->addPageLink('page_url', ['post_type' => 'page'])
        ->conditional('link_type', '==', 'internal')

->addTab('Footer')
    ->addRepeater('footer_columns', [
        'min' => 0,
        'max' => 4,
        'button_label' => 'Add Column',
        'layout' => 'block',
        ])
        ->addFields($column)
    ->endRepeater()

->setLocation('options_page', '==', 'website-settings');


add_action('acf/init', function () use ($general) {
    acf_add_local_field_group($general->build());
});
