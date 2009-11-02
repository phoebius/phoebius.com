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
class PhoebiusRoutingPolicy extends ChainedRoutingPolicy
{
	function __construct()
	{
		$this->setDefaultDispatcher(new MvcDispatcher());

		$this->fillRoutes();
	}

	protected function fillRoutes()
	{
		$this->addRule(
			'index',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Blog',
						'action' => 'showIndex',
					))
			))
		);

		$this->addRule(
			'blogEntry',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/blog/:date/:entryRestId*'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Blog',
						'action' => 'showEntry',
					))
			))
		);

		$this->addRule(
			'blogEntriesByDate',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/blog/:date/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Blog',
						'action' => 'showBlogEntriesByDate',
					))
			))
		);

		$this->addRule(
			'blogIndex',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/blog/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Blog',
						'action' => 'showBlogIndex',
					))
			))
		);

		$this->addRule(
			'feedback',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/feedback/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'CustomPage',
						'action' => 'feedback',
					))
			))
		);

		$this->addRule(
			'search',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/search/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'CustomPage',
						'action' => 'feedback',
					))
			))
		);

		$this->addRule(
			'adminEditEntry',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/admin/entry/?:id'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Admin',
						'action' => 'editEntry',
					))
			))
		);

		$this->addRule(
			'adminDeleteEntry',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/admin/entry/delete/?:id'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Admin',
						'action' => 'deleteEntry',
					))
			))
		);

		$this->addRule(
			'adminNewEntry',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/admin/entry/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Admin',
						'action' => 'newEntry',
					))
			))
		);

		$this->addRule(
			'adminLogin',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/admin/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Admin',
						'action' => 'login',
					))
			))
		);

		$this->addRule(
			'404',
			ParametricRewriteRule::create()
				->addParameters(array(
					'controller' => 'CustomPage',
					'action' => '404',
				))
		);
	}
}

?>