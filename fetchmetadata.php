<?php
/**
 * FetchMetadata Plugin
 *
 * @copyright  Copyright (C) 2020 Tobias Zulauf All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Response\JsonResponse;

/**
 * Plugin class for Fetch Metadata
 *
 * @since  1.0
 */
class PlgSystemFetchMetadata extends CMSPlugin
{
	/**
	 * Reject cross-origin requests to protect from CSRF, XSSI, and other bugs
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterInitialise()
	{
		$headers = array_change_key_case(getallheaders(), CASE_LOWER);

		// Allow requests from browsers which don't send Fetch Metadata
		if (!isset($headers['sec-fetch-site']))
		{
			return;
		}

		// Allow same-site and browser initiated requests
		if (in_array($headers['sec-fetch-site'],  ['same-origin', 'same-site', 'none']))
		{
			return;
		}

		// Allow simple top-level navigation from anywhere, <object> and <embed> send navigation requests, which we disallow.
		if ($headers['sec-fetch-mode'] === 'navigate'
			&& $this->getApplication()->input->server->get('REQUEST_METHOD', '', 'cmd') === 'GET'
			&& !in_array($headers['sec-fetch-dest'], ['object', 'embed']))
		{
			return;
		}

		// Opt out endpoints that are meant to serve cross-site traffic (Optional)
		$requestUri = $this->getApplication()->input->server->get('REQUEST_URI', '', 'string');

		foreach ($this->params->get('cors_endpoints', []) as $corsEndpoint)
		{
			if (empty($corsEndpoint->rule))
			{
				continue;
			}

			if (preg_match($corsEndpoint->rule, $requestUri))
			{
				return;
			}

			if ($requestUri === $corsEndpoint->rule)
			{
				return;
			}
		}

		// Reject all other requests that are cross-site and not navigational
		$this->getApplication()->enqueueMessage(Text::_('JINVALID_TOKEN'), 'error');
		echo new JsonResponse;
		$this->getApplication()->close();
	}
}
