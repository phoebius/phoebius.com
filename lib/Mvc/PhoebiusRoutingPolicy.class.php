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
 *
 *
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
			'blogIndex',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/blog/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Blog',
						'action' => 'showBlogEntries',
					))
			))
		);

		$this->addRule(
			'blogNav',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/blog/?:skip'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Blog',
						'action' => 'showBlogEntries',
					))
			))
		);


		$this->addRule(
			'blogEntry',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/blog/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'StrongByCatalog',
						'action' => 'showCommodity',
					))
			))
		);


		$this->addRule(
			'feedback',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/feedback/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Feedback',
						'action' => 'feedback',
					))
			))
		);

		$this->addRule(
			'adminIndex',
			RewriteRuleChain::create(array(
				WebUrlRewriteRule::create('/admin/'),

				ParametricRewriteRule::create()
					->addParameters(array(
						'controller' => 'Admin',
						'action' => 'index',
					))
			))
		);

		$this->addRule(
			'404',
			ParametricRewriteRule::create()
				->addParameters(array(
					'controller' => 'Page',
					'action' => 'show404',
				))
		);
	}
}

?>