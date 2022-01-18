# FetchMetadata Plugin

This Joomla Plugin helps to protect your sites by using [Fetch Metadata Request Headers](https://web.dev/fetch-metadata/) ([w3c-spec](https://www.w3.org/TR/fetch-metadata/))

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

- [Download the latest version of the plugin](https://github.com/zero-24/plg_system_fetchmetadata/releases/latest)
- Install the plugin using `Upload & Install`
- Enable the plugin `System - FetchMetadata` form the plugin manager

Now the inital setup is completed.

## Update Server

Please note that my update server only supports the latest version running the latest version of Joomla and atleast PHP 7.2.5.
Any other plugin version I may have added to the download section don't get updates using the update server.

## Issues / Pull Requests

You have found an Issue, have a question or you would like to suggest changes regarding this extension?
[Open an issue in this repo](https://github.com/zero-24/plg_system_fetchmetadata/issues/new) or submit a pull request with the proposed changes.

## Translations

You want to translate this extension to your own language? Check out my [Crowdin Page for my Extensions](https://joomla.crowdin.com/zero-24) for more details. Feel free to [open an issue here](https://github.com/zero-24/plg_system_fetchmetadata/issues/new) on any question that comes up.

## Beyond this repo

This plugin is intended as backport for an upcomming PR against the core CMS 4.1.

## Joomla! Extensions Directory (JED)

This plugin can also been found in the Joomla! Extensions Directory: [FetchMetadata by zero24](https://extensions.joomla.org/extension/fetchmetadata/)

## Release steps

- `build/build.sh`
- `git commit -am 'prepare release FetchMetadata 1.0.x'`
- `git tag -s '1.0.x' -m 'FetchMetadata 1.0.x'`
- `git push origin --tags`
- create the release on GitHub
- `git push origin master`

## Crowdin

### Upload new strings

`crowdin upload sources`

### Download translations

`crowdin download --skip-untranslated-files --ignore-match`
