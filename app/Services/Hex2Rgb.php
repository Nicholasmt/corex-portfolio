<?php

namespace App\Services;
 
class Hex2Rgb
{

   //* Function to convert Hex colors to RGBA
   public static function  hex2rgba($color, $opacity = false) 
   {

        $defaultColor = 'rgb(0,0,0)';

        // Return default color if no color provided
        if ( empty( $color ) ) {
            return $defaultColor;
        }

        // Ignore "#" if provided
        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

        // Check if color has 6 or 3 characters, get values
        if ( strlen($color) == 6 ) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }

        // Convert hex values to rgb values
        $rgb =  array_map( 'hexdec', $hex );

        // Check if opacity is set(rgba or rgb)
        if ( $opacity ) {
            if( abs( $opacity ) > 1 ) {
                $opacity = 1.0;
            }
            $output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode( ",", $rgb ) . ')';
        }

        // Return rgb(a) color string
        return $output;

    } 
}