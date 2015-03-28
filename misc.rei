	$date = strtotime('your date/time here');

    $difference = time() - $date;
    $periods = array(
        'decade' => 315360000,
        'year'   => 31536000,
        'month'  => 2628000,
        'week'   => 604800, 
        'day'    => 86400,
        'hour'   => 3600,
        'minute' => 60,
        'second' => 1);
    
    $retval = '';
    if ($difference < 1)
    {
        $retval = "less than 1 second";
    }
    else
    {
        foreach ($periods as $key => $value)
        {
            if ($difference >= $value)
            {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
            }
        }
    }
    return $retval.' ago';