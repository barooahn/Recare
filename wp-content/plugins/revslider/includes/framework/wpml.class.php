<?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      http://www.themepunch.com/
 * @copyright 2015 ThemePunch
 */

if (!defined('ABSPATH')) exit();

class RevSliderWpml
{

    /**
     *
     * check if all languages exists in the given langs array
     */
    public static function isAllLangsInArray($arrCodes)
    {
        $arrAllCodes = self::getArrLangCodes();
        $diff = array_diff($arrAllCodes, $arrCodes);
        return (empty($diff));
    }

    /**
     *
     * get assoc array of lang codes
     */
    public static function getArrLangCodes($getAllCode = true)
    {

        $arrCodes = array();

        if ($getAllCode == true)
            $arrCodes["all"] = "all";

        self::validateWpmlExists();

        $wpml = new SitePress();
        $arrLangs = $wpml->get_active_languages();
        /* NEW:
        $arrLangs = apply_filters( 'wpml_active_languages', array() );
        */
        foreach ($arrLangs as $code => $arr) {
            $arrCodes[$code] = $code;
        }

        return ($arrCodes);
    }

    /**
     *
     * valdiate that wpml exists
     */
    private static function validateWpmlExists()
    {
        if (!self::isWpmlExists())
            RevSliderFunctions::throwError("The wpml plugin is not activated");
    }

    /**
     *
     * true / false if the wpml plugin exists
     */
    public static function isWpmlExists()
    {
        // TODO wpml_is_active API call needed
        if (class_exists("SitePress"))
            return (true);
        else
            return (false);
    }

    /**
     *
     * get langs with flags menu list
     * @param $props
     */
    public static function getLangsWithFlagsHtmlList($props = "", $htmlBefore = "")
    {

        $arrLangs = self::getArrLanguages();
        /* NEW:
        $arrLangs = apply_filters( 'wpml_active_languages', array() );
        */
        if (!empty($props))
            $props = " " . $props;

        $html = "<ul" . $props . ">" . "\n";
        $html .= $htmlBefore;


        foreach ($arrLangs as $code => $title) {
            $urlIcon = self::getFlagUrl($code);
            /* NEW:
            foreach($arrLangs as $lang){
                $code = $lang['language_code'];
                $title = $lang['native_name'];
                $urlIcon = $lang['country_flag_url'];
            */
            $html .= "<li data-lang='" . $code . "' class='item_lang'><a data-lang='" . $code . "' href='javascript:void(0)'>" . "\n";
            $html .= "<img src='" . $urlIcon . "'/> $title" . "\n";
            $html .= "</a></li>" . "\n";
        }

        $html .= "</ul>";


        return ($html);
    }

    /**
     *
     * get languages array
     */
    public static function getArrLanguages($getAllCode = true)
    {

        self::validateWpmlExists();

        $wpml = new SitePress();
        $arrLangs = $wpml->get_active_languages();
        /* NEW:
        $arrLangs = apply_filters( 'wpml_active_languages', array() );
        */

        $response = array();

        if ($getAllCode == true)
            $response["all"] = __("All Languages", 'revslider');

        foreach ($arrLangs as $code => $arrLang) {
            $name = $arrLang["native_name"];
            $response[$code] = $name;
        }

        return ($response);
    }

    /**
     * get flag url
     */
    public static function getFlagUrl($code)
    {

        self::validateWpmlExists();

        $wpml = new SitePress();

        if (empty($code) || $code == "all")
            $url = RS_PLUGIN_URL . 'admin/assets/images/icon-all.png';
        else
            $url = $wpml->get_flag_url($code);

        /* NEW:
        if ( empty( $code ) || $code == "all" ) {
            $url = ICL_PLUGIN_URL . '/res/img/icon16.png';
        } else {
            $active_languages = apply_filters( 'wpml_active_languages', array() );
            $url = isset( $active_languages[$code]['country_flag_url'] ) ? $active_languages[$code]['country_flag_url'] : null;
        }
        */

        //default: show all
        if (empty($url)) {
            $url = RS_PLUGIN_URL . 'admin/assets/images/icon-all.png';
            // NEW: $url = ICL_PLUGIN_URL . '/res/img/icon16.png';
        }

        return ($url);
    }

    /**
     *
     * get language title by code
     */
    public static function getLangTitle($code)
    {

        $langs = self::getArrLanguages();

        if ($code == "all")
            return (__("All Languages", 'revslider'));

        if (array_key_exists($code, $langs))
            return ($langs[$code]);

        $details = self::getLangDetails($code);
        if (!empty($details))
            return ($details["english_name"]);

        return ("");
        /* NEW:
        $default_language = apply_filters( 'wpml_default_language', null );
        return apply_filters( 'wpml_translated_language_name', '', $code, $default_language );
        */
    }

    /**
     * get language details by code
     */
    private function getLangDetails($code)
    {
        global $wpdb;

        $details = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "icl_languages WHERE code='$code'");

        if (!empty($details))
            $details = (array)$details;

        return ($details);
    }

    /**
     *
     * get current language
     */
    public static function getCurrentLang()
    {
        self::validateWpmlExists();
        $wpml = new SitePress();


        if (is_admin())
            $lang = $wpml->get_default_language();
        else
            $lang = RevSliderFunctionsWP::getCurrentLangCode();

        /* NEW:
        if ( is_admin() ) {
            return apply_filters( 'wpml_default_language', null );
        }
        return apply_filters( 'wpml_current_language', null );
        */

        return ($lang);
    }
}

/**
 * old classname extends new one (old classnames will be obsolete soon)
 * @since: 5.0
 **/
class UniteWpmlRev extends RevSliderWpml
{
}

?>