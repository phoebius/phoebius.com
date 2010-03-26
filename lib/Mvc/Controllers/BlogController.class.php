<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 Scand Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
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

		$release =
			PhoebiusRelease::query()
				->orderBy(OrderBy::desc('date'))
				->setLimit(1)
				->getEntity();

		$this->getModel()->append(array(
			'release' => $release,
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
					Expression::eq('pubDate', $date)
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
							->add(Expression::eq('pubDate', $date))
							->add(Expression::eq('restId', $entryRestId->getValue()))
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

		$count = BlogEntry::query()->getCount();

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