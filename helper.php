<?php

class modchform
{

    public static function getJobs()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('name'))
                    ->from('job1');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
}  