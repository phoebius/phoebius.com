<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
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
 * @mainpage API Browser
 *
 * Phoebius consists of dozens of highly-stratified packages implementing various functionality,
 * which is applicable both for application development and for internal support of Phoebius'
 * feature set.
 *
 * What package to choose as the start point for learning the framework concepts?
 *
 * Take a look at SiteApplication class, as it initializes environment object wrappers.
 *
 * Then design the application routes using ChainedRouter. Use ChainedRouter::route() to define
 * custom routes which may point to different controllers and their actions.
 *
 * Bootstrap the application development with using of MVC:
 * - ActionBasedController as the heart of simple controller-action application flow:
 *   - define custom methods
 *   - use ActionBasedController::getModel() to fill the model passed to a view
 *   - define resulting view with ActionBasedController::view()
 * - UIViewPresentation as the extensible template engine similar to ASP.NET MVC's views
 *   - UIViewPresentation::getHtmlLink(), UIViewPresentation::getHref() as helper methods
 *   - define the custom helper methods by extending the UIViewPresentation or even implementing your own template engine as UIPresentation
 *   - reate custom set of UIControl or UIPage classes (which are also looked up when invoking helpers wihtin the UIViewPresentation)
 *
 * Apply the business logic by querying ORM entities with EntityQuery:
 * - set custom projections (EntityProjection, RowCountProjection and more)
 * - limit the results with expressions (Expression as static factory for various expressions)
 */

?>