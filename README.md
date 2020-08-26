# FetchMetadata Plugin

This Joomla Plugin helps to protect your sites by using [Fetch Metadata Request Headers](https://web.dev/fetch-metadata/) ([w3c-spec](https://www.w3.org/TR/fetch-metadata/))

## Sponsoring and Donation

You use this extension in an commercial context and / or want to support me and give something back?

There are two ways to support me right now:
- This extension is part of [Github Sponsors](https://github.com/sponsors/zero-24/) by sponsoring me, you help me continue my oss work for the [Joomla! Project](https://volunteers.joomla.org/joomlers/248-tobias-zulauf), write bug fixes, improving features and maintain my extensions.
- You just want to send me an one-time donation? Great you can do this via [PayPal.me/zero24](https://www.paypal.me/zero24).

Thanks for your support!

## Features

This Joomla Plugin helps to protect your sites by using [Fetch Metadata Request Headers](https://web.dev/fetch-metadata/)

The implemened rules are:
- Step 1: Allow requests from browsers which don't send Fetch Metadata
- Step 2: Allow same-site and browser-initiated requests
- Step 3: Allow simple top-level navigation and iframing
- Step 4: Opt out endpoints that are meant to serve cross-site traffic (Optional)
- Step 5: Reject all other requests that are cross-site and not navigational

## Configuration

### Initial setup the plugin

- Download the latest version of the plugin: https://github.com/zero-24/plg_system_fetchmetadata/releases/latest
- Install the plugin using Upload & Install
- Enable the plugin form the plugin manager

Now the inital setup is completed.

### Option descriptions

#### Allow iframes

#### Whitelist CORS endpoints

This plugin is translated into the following languages:
- de-DE by @zero-24
- en-GB by @zero-24

You want to contribute a translation for an additional language? Feel free to create an Pull Request against the master branch.

## Update Server

Please note that my update server only supports the latest version running the latest version of Joomla and atleast PHP 7.2.5.
Any other plugin version I may have added to the download section don't get updates using the update server.

## Issues / Pull Requests

You have found an Issue or have an question / suggestion regarding the plugin, or do you want to propose code changes?
[Open an issue in this repo](https://github.com/zero-24/plg_system_fetchmetadata/issues/new) or submit a pull request with the proposed changes against the master branch.

## Beyond this repo

This plugin is intended as backport for an upcomming PR against the core CMS.

## Joomla! Extensions Directory (JED)

This plugin can also been found in the Joomla! Extensions Directory: [FetchMetadata by zero24](https://extensions.joomla.org/extension/fetchmetadata/)

## Release steps

- `build/build.sh`
- `git commit -am 'prepare release FetchMetadata 1.0.x'`
- `git tag -s '1.0.x' -m 'FetchMetadata 1.0.x'`
- `git push origin --tags`
- create the release on GitHub
- `git push origin master`
