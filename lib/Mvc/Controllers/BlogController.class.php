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
 * @ingroup Phoebius_Mvc_Controllers
 */
class BlogController extends BasePhoebiusController
{
	const LIMIT_ENTRIES_PER_PAGE = 10;

	function action_showIndex()
	{
		$this->showEntryList();

		$releases = new XmlReleaseSetBuilder(
			PHOEBIUS_SITE_DOCS_SRC_PATH . '/xml/other/releases.xml'
		);
		$releases->build();

		$this->getModel()->append(array(
			'release' => $releases->getLatestRelease(),
			'breadScrumbs' => array(
				new ViewLink('Blog', '/blog/')
			)
		));

		return 'index';
	}

	function action_showBlogIndex(Integer $skip = null)
	{
		$this->showEntryList($skip ? $skip->getValue() : 0);

		return 'blog/index';
	}

	function action_showBlogEntriesByDate(Date $date)
	{
		$blogEntries =
			EntityQuery::create(BlogEntry::orm())
				->where(
					Expression::eq(
						'pubDate', $date
					)
				)
				->orderBy(OrderBy::desc('pubDate'))
				->getList();

		$this->getModel()->append(array(
			'entries' => $blogEntries,
			'breadScrumbs' => array(
				new ViewLink('Blog', '/blog/')
			)
		));

		return 'blog/entry-by-date';
	}

	function action_showEntry(Date $date, String $entryRestId)
	{
		try {
			$entry =
				EntityQuery::create(BlogEntry::orm())
					->where(
						Expression::andChain()
								->add(
									Expression::eq('pubDate', $date)
								)
								->add(
									Expression::eq('restId', $entryRestId->getValue())
								)
					)
					->getEntity();
		}
		catch (OrmEntityNotFoundException $e) {
			throw $e;
		}

		$this->getModel()->append(array(
			'entries' => array($entry),
			'breadScrumbs' => array(
				new ViewLink('Blog', '/blog/')
			)
		));


		return 'blog/entry-by-date';
	}

	private function showEntryList($offset = 0)
	{
		$blogEntries =
			EntityQuery::create(BlogEntry::orm())
				->orderBy(OrderBy::desc('pubDate'))
				->setLimit(self::LIMIT_ENTRIES_PER_PAGE)
				->setOffset($offset)
				->getList();

		$count =
			EntityQuery::create(BlogEntry::orm())
				->getCount();

		$this->getModel()->append(array(
			'entries' => $blogEntries,
			'countLeft' =>
				$count - $offset - sizeof($blogEntries) > 0
					? $offset + self::LIMIT_ENTRIES_PER_PAGE
					: 0,
			'countRight' =>
				$offset > 0
					? $offset - self::LIMIT_ENTRIES_PER_PAGE
					: 0,
			'notIndexPage' => $offset > 0,
			'breadScrumbs' => array(
				new ViewLink('Blog', '/blog/')
			)
		));
	}
}

?>