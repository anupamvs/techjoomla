<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * View class for a list of users.
 *
 * @since  1.6
 */
class ProductViewProducts extends JViewLegacy
{
	/**
	 * The item data.
	 *
	 * @var   object
	 * @since 1.6
	 */
	protected $items;

	/**
	 * The pagination object.
	 *
	 * @var   JPagination
	 * @since 1.6
	 */
	protected $pagination;

	/**
	 * The model state.
	 *
	 * @var   JObject
	 * @since 1.6
	 */
	protected $state;

	/**
	 * A JForm instance with filter fields.
	 *
	 * @var    JForm
	 * @since  3.6.3
	 */
	public $filterForm;

	/**
	 * An array with active filters.
	 *
	 * @var    array
	 * @since  3.6.3
	 */
	public $activeFilters;

	/**
	 * An ACL object to verify user rights.
	 *
	 * @var    JObject
	 * @since  3.6.3
	 */
	protected $canDo;

	/**
	 * An instance of JDatabaseDriver.
	 *
	 * @var    JDatabaseDriver
	 * @since  3.6.3
	 */
	protected $db;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		
		$app = JFactory::getApplication();
		$context = "product.list.admin.product";
		$this->items         = $this->get('Items');
		$this->pagination    = $this->get('Pagination');
		$this->state         = $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'name', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
		//$this->canDo         = JHelperContent::getActions('com_product');
		$this->db            = JFactory::getDbo();
		$this->script = $this->get('Script');
		
		//UsersHelper::addSubmenu('users');
		$form = $this->get('Form');

		//Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		// Include the component HTML helpers.
		//JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

		$this->addToolbar();
		//$this->sidebar = JHtmlSidebar::render();
		$this->setDocument();
		$this->form = $form;
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolbar()
	{
		JToolBarHelper::title( 'Product Component', 'generic.png' );
      	JToolBarHelper::deleteList('product.delete');
      	JToolBarHelper::editList('product.edit');
      	JToolBarHelper::addNew('product.add');
      	JToolBarHelper::publish();
      	JToolBarHelper::unpublish();
      	JToolBarHelper::preferences('com_product', '500');
		JToolbarHelper::help('JHELP_USERS_USER_MANAGER');
	}
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('Product Component'));
	}
	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.0
	 */
	protected function getSortFields()
	{
		return array(
			'a.name'          => JText::_('COM_USERS_HEADING_NAME'),
			'a.username'      => JText::_('JGLOBAL_USERNAME'),
			'a.block'         => JText::_('COM_USERS_HEADING_ENABLED'),
			'a.activation'    => JText::_('COM_USERS_HEADING_ACTIVATED'),
			'a.email'         => JText::_('JGLOBAL_EMAIL'),
			'a.lastvisitDate' => JText::_('COM_USERS_HEADING_LAST_VISIT_DATE'),
			'a.registerDate'  => JText::_('COM_USERS_HEADING_REGISTRATION_DATE'),
			'a.id'            => JText::_('JGRID_HEADING_ID'),
		);
	}
}
