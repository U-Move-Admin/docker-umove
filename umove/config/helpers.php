<?php
//namespace App\Libraries;

if (! function_exists('formatPrice')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function formatPrice($money, $type = 'GBP', $span = TRUE)
    {
        $money_format = number_format($money,0,',','.')." $type";
        if($span)
            $money_format = "<span>".$money_format."</span>";

        return $money_format;
    }
   

}
