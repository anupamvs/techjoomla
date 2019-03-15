<?php
	class ModHelloWorldHelper
	{
		/**
		 * Retrieves the hello message
		 *
		 * @param   array  $params An object containing the module parameters
		 *
		 * @access public
		 */    
		public static function getHello($params)
		{
			return 'Hello, World!';
		}
		public static function getRecords($params)
		{
			$db=JFactory::getDbo();
			$query=$db->getQuery(true);
			$query->select($db->quoteName(array('id','name','category','description')));
			$query->from($db->quoteName('#__product'));
			$db->setQuery($query);

			// Load the results as a list of stdClass objects (see later for more options on retrieving data).
			$results = $db->loadObjectList();
			return $results;

		}
	}
?>
