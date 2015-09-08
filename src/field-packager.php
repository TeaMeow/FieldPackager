<?php

/**
 * FieldPackager Static Class
 *
 * @category  Database Access
 * @package   FieldPackager
 * @author    Yami Odymel <yamiodymel@gmail.com>
 * @copyright Copyright (c) 2015
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      http://github.com/TeaMeow/FieldPackager
 * @version   1.0
 **/

class FieldPackager
{
    public  static $HasAira    = false;
    private static $field_type = true;
    private static $NormalName = true;
    
    private static $List    = [];
                       
    
    
    /**
     * To Field
     * 
     * Convert the normal name to a field name.
     * 
     * @param  string $Name   The normal name.
     * @return string         Field name.
     */
     
    public static function ToField($Name)
    {
        if(isset(self::$List[$Name]))
            return self::$List[$Name];
            
        return self::$field_type ? strtolower(preg_replace('/\B([A-Z])/', '_$1', $Name))
                                 : strtolower(preg_replace('/\B([A-Z])/', '-$1', $Name));
    
        //return (self::$HasAira) ? Aira::Add('FIELDER_UNKNOWN') : false;
    }
    
    
    
    
    /**
     * To Normal
     * 
     * Convert the field name to normal name.
     * 
     * @param  string $Field   The field name.
     * @return string          Normal name.
     */
     
    public static function ToNormal($Field)
    {
       
    }
    
    
    
    
    /**
     * Package
     * 
     * Package a raw array.
     * 
     * @param  array       $Source   The raw array.
     * @param  string|null $Single   The name of the value, return this value only if this is setted.
     * @return mixed                 The cooked array or single value.
     */
     
    public static function Package($Source, $Single=null)
    {
        if(empty($Source) || is_null($Source) || !$Source)
            return null;

        $Cooked = [];
        
        if(count($Source) != count($Source, 1))
        {
            foreach($Source as $Row => $Single)
                $Cooked[] = self::Package($Single);
            return $Cooked;
        }
        
        foreach($Source as $Key => $Value)
        {
            if(!$Name = array_search($Key, self::$List))
            {
                $Name = str_replace(' ', '', ucwords(str_replace('_', ' ', $Key)));
                
                if(!self::$NormalName)
                    $Name = lcfirst($Name);
            }
                
            $Cooked[$Name] = $Value;
        }
        
        if(!$Single)
            return $Cooked;
        else
            return isset($Cooked[$Single]) ? $Cooked[$Single] : null;
    }
}
?>
