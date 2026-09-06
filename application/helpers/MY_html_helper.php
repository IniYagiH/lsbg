<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Script
*
* Generates a script inclusion of a JavaScript file
* Based on the CodeIgniters original Link Tag.
*
* Author(s): Isern Palaus <ipalaus@ipalaus.es>
*            David Mulder <david@greatslovakia.com>
*
* Modified to accomodate html5 syntax
* SEE: http://www.tutorialspoint.com/html5/html5_syntax.htm
*
* MODIFY : /application/config/autoload.php
*    make sure the extended helper is loaded first such as 'MY_html' before 'html',
*    otherwise you will get a loading error
* $autoload['helper'] = array('url', 'MY_html', 'html', 'form');
*
* @access   public
* @param    mixed    javascript sources or an array
* @param    string   language
* @param    string   type
* @param    boolean  should index_page be added to the javascript path
* @param    boolean  type
* @return   string   html5
*/

if ( ! function_exists('script_tag'))
{
    function script_tag($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE, $html5 = true)
    {
        $CI =& get_instance();

        $script = '<scr'.'ipt';

        if (is_array($src))
        {
            foreach ($src as $k=>$v)
            {
                if ($k == 'src' AND strpos($v, '://') === FALSE)
                {
                    if ($index_page === TRUE)
                    {
                        $script .= ' src="'.$CI->config->site_url($v).'"';
                    }
                    else
                    {
                        $script .= ' src="'.$CI->config->slash_item('base_url').$v.'"';
                    }
                }
                else
                {
                    $script .= "$k=\"$v\"";
                }
            }

            $script .= "></scr'.'ipt>\n";
        }
        else
        {
            if ( strpos($src, '://') !== FALSE)
            {
                $script .= ' src="'.$src.'"'; // removed extra space - Bill Hernandez(Plano, Texas)
            }
            elseif ($index_page === TRUE)
            {
                $script .= ' src="'.$CI->config->site_url($src).'"'; // removed extra space - Bill Hernandez(Plano, Texas)
            }
            else
            {
                $script .= ' src="'.$CI->config->slash_item('base_url').$src.'"'; // removed extra space - Bill Hernandez(Plano, Texas)
            }

            if(false == $html5)                     // fixed a bug - Bill Hernandez(Plano, Texas)
            {
                $script .= ' language="'.$language; // added extra space - Bill Hernandez(Plano, Texas)
                $script .= '" type="'.$type.'"';
            }

            $script .= '></scr'.'ipt>'."\n";        // removed extra space - Bill Hernandez(Plano, Texas)
        }

        return $script;
    }
}
?>
