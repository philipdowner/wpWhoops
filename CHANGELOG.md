# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).
This change log adheres to [Keep a CHANGELOG](http://keepachangelog.com/).

## 1.3.3
- Ensures plugin never loaded before `plugins_loaded` action. This ensures conflicts with Jetpack Autoloader are minimized.

## 1.3.2
- Suppresses `E_DEPRECATED` notices in all paths

## 1.3.1 - 2025-03-31
- Changes plugin back to installing as standard `wordpress-plugin`, primarily due to the fact that WordPress does not support mu-plugins in subdirectories.

## 1.3.0 - 2025-03-21
- [Merges PR #16](https://github.com/Rarst/wps/pull/16) submitted to Rarst/wps to update `composer-installers` version
- Installs plugin as a `mu-plugin` to better support development on WordPress multi-site
- Renames plugin from `wps` to `wpWhoops` to make it more identifiable on WP Admin screens
- Adds version number string to plugin file header and composer.json 

## 1.2 - 2018-12-18

### Added
- plain text handler for CLI context

### Changed
- updated dependencies (whoops 2.3.1)

## 1.1 - 2017-10-27

### Added
- WP REST API handler

### Changed
- Updated dependencies (whoops 2.1.12, Pimple 3.2.2)

## 1.0 - 2016-05-08

### Added
- Initial stable release.