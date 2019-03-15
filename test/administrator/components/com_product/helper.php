<?php
	class ProductHelper
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
		public static function getProducts()
		{
			$db=JFactory::getDbo();
			$query=$db->getQuery(true);
			$query->select($db->quoteName(array('id','name','category','description')));
			$query->from($db->quoteName('#__product'));
			$db->setQuery($query);
			$results = $db->loadObjectList();
			return $results;

		}
	}
?>
