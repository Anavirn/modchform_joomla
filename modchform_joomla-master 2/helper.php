<?php

class modchform
{

    public static function getJobsSoins()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('soins'))
                    ->from('job_soins');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }

     public static function getJobsSocial()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('social'))
                    ->from('job_social');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
  

   public static function getJobsIngen()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('ingen'))
                    ->from('job_ingen');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
 


   public static function getJobsLogis()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('logis'))
                    ->from('job_logis');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
 

   public static function getJobsQual()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('qual'))
                    ->from('job_qual');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
 


   public static function getJobsSys()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('sys'))
                    ->from('job_sys');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
 

   public static function getJobsGest()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('gest'))
                    ->from('job_gest');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
 


   public static function getJobsManag()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('manag'))
                    ->from('job_manag');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
 

   public static function getJobsMedic()
    {


        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('medic'))
                    ->from('job_medic');
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the Hello
        return $result;


    }
}  