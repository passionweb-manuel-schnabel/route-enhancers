<?php

defined('TYPO3') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'RouteEnhancers',
    'Simple',
    [
        \Passionweb\RouteEnhancers\Controller\RouteEnhancerController::class => 'simpleRouteEnhancer'
    ],
    // non-cacheable actions
    [
        \Passionweb\RouteEnhancers\Controller\RouteEnhancerController::class => 'simpleRouteEnhancer'
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'RouteEnhancers',
    'Extbase',
    [
        \Passionweb\RouteEnhancers\Controller\RouteEnhancerController::class => 'extbaseRouteEnhancer'
    ],
    // non-cacheable actions
    [
        \Passionweb\RouteEnhancers\Controller\RouteEnhancerController::class => 'extbaseRouteEnhancer'
    ]
);

// wizards
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                simple {
                    iconIdentifier = route-enhancer-plugin-simple
                    title = LLL:EXT:route_enhancers/Resources/Private/Language/locallang_db.xlf:plugin_routeenhancer_simple.name
                    description = LLL:EXT:route_enhancers/Resources/Private/Language/locallang_db.xlf:plugin_routeenhancer_simple.description
                    tt_content_defValues {
                        CType = list
                        list_type = routeenhancers_simple
                    }
                }
                extbase {
                    iconIdentifier = route-enhancer-plugin-extbase
                    title = LLL:EXT:route_enhancers/Resources/Private/Language/locallang_db.xlf:plugin_routeenhancer_extbase.name
                    description = LLL:EXT:route_enhancers/Resources/Private/Language/locallang_db.xlf:plugin_routeenhancer_extbase.description
                    tt_content_defValues {
                        CType = list
                        list_type = routeenhancers_extbase
                    }
                }
            }
            show = *
        }
   }'
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'route-enhancer-plugin-simple',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:route_enhancers/Resources/Public/Icons/Extension.png']
);
$iconRegistry->registerIcon(
    'route-enhancer-plugin-extbase',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:route_enhancers/Resources/Public/Icons/Extension.png']
);

