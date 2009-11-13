<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * All rights reserved.
 *
 ************************************************************************************************/

/**
 * /
 * /blog/
 * /blog/?skip=1
 * /blog/01.11.2009/
 * /blog/01.11.2009/new-orm
 * /feedback/
 * /search/
 * /admin/
 * /admin/entry/?id
 *
 * @ingroup Phoebius_Mvc
 */
class PhoebiusRouter extends ChainedRouter
{
	function __construct()
	{
		parent::__construct(new MvcDispatcher());

		$this->fillRoutes();
	}

	protected function fillRoutes()
	{
		$this->route(
			'blogEntry',
			'/blog:controller/:date/:entryRestId*',
			array('action' => 'showEntry')
		);

		$this->route(
			'blogEntriesByDate',
			'/blog:controller/:date/',
			array('action' => 'showBlogEntriesByDate')
		);

		$this->route(
			'blogIndex',
			'/blog:controller/',
			array('action' => 'showBlogIndex')
		);

		$this->route(
			'feedback',
			'/feedback/',
			array('controller' => 'CustomPage', 'action' => 'feedback')
		);

		$this->route(
			'search',
			'/search/',
			array('controller' => 'CustomPage', 'action' => 'search')
		);

		$this->route(
			'adminEditEntry',
			'/admin:controller/entry/?id',
			array('action' => 'editEntry')
		);

		$this->route(
			'adminDeleteEntry',
			'/admin:controller/entry/delete/?id',
			array('action' => 'deleteEntry')
		);

		$this->route(
			'adminNewEntry',
			'/admin:controller/entry/',
			array('action' => 'newEntry')
		);

		$this->route(
			'adminLogin',
			'/admin:controller/',
			array('action' => 'login')
		);
		
		$this->route(
			'index',
			'/',
			array('controller' => 'Blog', 'action' => 'showIndex')
		);
		
		$fallbackRoute = new Route(
			$this->getDefaultDispatcher(),
			ParameterImportRule::multiple(array(
				'controller' => 'CustomPage',
				'action' => '404'
			))
		);
		
		$this->setFallbackRoute($fallbackRoute);
	}
}

?>