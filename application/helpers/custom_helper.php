<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function encodePassword($id, $password)
{
    return md5('larrizo' . $id . $password);
}

function initBlocks($blocks)
{
    $CI = & get_instance();

    $blockHTML = array();
    foreach ($blocks as $block) {
        switch ($block) {
            case "todays-deal":
                $blockHTML[$block] = $CI->load->view('_blocks/todays-deal', '', TRUE);
                break;
            case "newsletter":
                $blockHTML[$block] = $CI->load->view('_blocks/newsletter', '', TRUE);
                break;
            case "facebook":
                $blockHTML[$block] = $CI->load->view('_blocks/facebook', '', TRUE);
                break;
        }
    }

    return $blockHTML;
}

function addScript($scripts)
{
    $syntax = "";

    foreach ($scripts as $script) {
//        if (file_exists(__DIR__.'/../..'.$script))
        $syntax .= "<script type='text/javascript' src='" . $script . "'></script>";
    }

    return $syntax;
}

function __($text)
{
    return $text;
}

function days()
{
    $days = array();

    for ($i = 1; $i <= 31; $i++)
        $days[] = $i;

    return $days;
}

function months()
{
    $months = array(
        __('January'),
        __('February'),
        __('March'),
        __('April'),
        __('May'),
        __('June'),
        __('July'),
        __('August'),
        __('September'),
        __('October'),
        __('November'),
        __('December')
    );

    return $months;
}

function years($ahead = FALSE)
{
    $years = array();

    if (!$ahead)
        for ($i = 1900; $i <= date("Y", time()); $i++)
            $years[$i] = $i;
    else
        for ($i = date("Y", time()); $i <= date("Y", time())+10; $i++)
            $years[$i] = $i;

    return $years;
}

function validatePhone($phone) {
    return preg_match('/^\+?[0-9]+$/i', $phone);
}

function validatePassword($password) {
    return preg_match('/^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/', $password);
}