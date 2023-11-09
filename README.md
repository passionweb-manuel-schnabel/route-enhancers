# Using RouteEnhancers in TYPO3

Shows the integration of a simple and an extbase route enhancer. (TYPO3 CMS)

## What does it do?

Adds two plugins to show the usage of the two different route enhancer types "Simple" and "Extbase".

## Installation

Add via composer:

    composer require "passionweb/route-enhancers"

* Install the extension via composer
* Flush TYPO3 and PHP Cache

## Requirements

This example uses no 3rd party libraries.

## Simple RouteEnhancer

Add the following snippet to the `routeEnhancers` section within your `config.yaml`:

    SimpleRouteEnhancerExample:
        type: Simple
        limitToPages: [ PAGE_ID ]
        routePath: '/{order_id}'
        requirements:
          order_id: '[a-zA-Z0-9].*'
        _arguments: {}

Insert the `SimpleRouteEnhancer` plugin on a page and replace the `PAGE_ID` placeholder above with the page id(s) of the page(s) where you inserted the plugin.

## Extbase RouteEnhancer

Add the following snippet to the `routeEnhancers` section within your `config.yaml`:

    ExtbaseRouteEnhancerExample:
        type: Extbase
        limitToPages: [ PAGE_ID ]
        extension: RouteEnhancers
        plugin: Extbase
        defaultController: 'RouteEnhancer::extbaseRouteEnhancer'
        routes:
          - routePath: '/{entry}'
            _controller: 'RouteEnhancer::extbaseRouteEnhancer'
            _arguments:
              entry: entry
        aspects:
          entry:
            type: PersistedAliasMapper
            tableName: tx_routeenhancers_domain_model_entry
            routeFieldName: uid

Insert the `ExtbaseRouteEnhancer` plugin on a page and replace the `PAGE_ID` placeholder above with the page id(s) of the page(s) where you inserted the plugin.

## Frontend configuration "enforceValidation"

If this setting is active you need to add the `order_id` parameter to the `excludedParameters`
if you want to use exactly the code snippets from this example repository.

    'cacheHash' => [
        'enforceValidation' => true,
        'excludedParameters' => [
            'order_id',
        ],
    ],

## Extension settings

There are no extension settings available.

## Troubleshooting and logging

If something does not work as expected take a look at the log file.
Every problem is logged to the TYPO3 log (normally found in `var/log/typo3_*.log`)

## Achieving more together or Feedback, Feedback, Feedback

I'm grateful for any feedback! Be it suggestions for improvement, requests or just a (constructive) feedback on how good or crappy this snippet/repo is.

Feel free to send me your feedback to [service@passionweb.de](mailto:service@passionweb.de "Send Feedback") or [contact me on Slack](https://typo3.slack.com/team/U02FG49J4TG "Contact me on Slack")
