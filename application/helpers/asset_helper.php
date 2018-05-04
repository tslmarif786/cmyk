<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('res_url'))
{
    function res_url()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path
        return $CI->config->item('res_url');
    }
}


if ( ! function_exists('physical_path'))
{
    function physical_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path 
        return $CI->config->item('physical_path');
    }
}
if ( ! function_exists('redirectToHTTPS'))
{
	function redirectToHTTPS()
	{
	  if(!isset($_SERVER['HTTPS']))
	  {
		 $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		 header("Location:$redirect");
	  }
	  else if($_SERVER['HTTPS']!='on')
	  {
		 $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		 header("Location:$redirect");
	  }
	}
}
