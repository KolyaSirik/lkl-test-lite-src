# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

-------------------------------------------------------------------------

## [10.0.1]() - _2022-07-27_
### Fixed
* Update all modules: in Copyright message add Lenderkit OÜ ([LK-6475](http://youtrack.jc/issue/LK-6475))

-------------------------------------------------------------------------

## [v10.0.0]() - _2022-15-07_

### Breaking changes
* Implement captcha in webapp ([LK-6169](http://youtrack.jc/issue/LK-6169))

-------------------------------------------------------------------------

## [v9.0.0]() - _2022-04-02_

### Changed
* Platform -> Finance Update query for postgre ([LK-5242](http://youtrack.jc/issue/LK-5242))

-------------------------------------------------------------------------

## [v8.0.0]() - _2021-12-23_
### Added
* Change type hint from Builder to Builder|Relation ([LK-5058](http://youtrack.jc/issue/LK-5058))

-------------------------------------------------------------------------

## [v7.0.0]() - _2021-10-11_
### Breaking changes
* MM : Site Request Module to MM ([LK-4869](http://youtrack.jc/issue/LK-4869))

-------------------------------------------------------------------------

## [v6.0.0]() - _2021-03-19_
### Breaking changes
* Migration to Laravel 8 ([LK-3269](http://youtrack.jc/issue/LK-3269))

### Added
* No Data Feature FE ([LK-3559](http://youtrack.jc/issue/LK-3559))

-------------------------------------------------------------------------

## [5.0.0]() - _2021-02-05_
### Changed
* Refactor translations structure for api/admin for all modules, register API translations ([LK-3384](http://youtrack.jc/issue/LK-3384))

-------------------------------------------------------------------------

## [4.1.0]() - _2020-09-21_
### Changed
* Icons Refactoring ([LK-1782](http://youtrack.jc/issue/LK-1782))

-------------------------------------------------------------------------

## [4.0.0]() - _2020-09-01_
### Added
* GDPR personal data collecting: related entities ([LK-1911](http://youtrack.jc/issue/LK-1911))

-------------------------------------------------------------------------

## [3.0.1]() - _2020-08-14_
### Changed
* Check all Titles ([LK-1828](http://youtrack.jc/issue/LK-1828))

-------------------------------------------------------------------------

## [3.0.0]() - _2020-07-16_

### Added
* Back office interface and routes permissions coverage ([LK-1490](http://youtrack.jc/issue/LK-1490))

### Changed
* Permissions CamelCase Issue ([LK-1647](http://youtrack.jc/issue/LK-1647))
* New admin navigation ([LK-1640](http://youtrack.jc/issue/LK-1640))
* Tide Up Swagger ([LK-1474](http://youtrack.jc/issue/LK-1474))

### Fixed
* Demo server. 500 error, when user try to send Site request ([LK-1576](http://youtrack.jc/issue/LK-1576))

-------------------------------------------------------------------------

## [2.0.0]() - _2020-06-19_

### Breaking Changes
* Admin panel Restyling ([LK-1128](http://youtrack.jc/issue/LK-1128))
* Moved swagger docs from core to module ([LK-1265](http://youtrack.jc/issue/LK-1265))

-------------------------------------------------------------------------

## [1.2.0]() - _2020-05-22_

### Breaking Changes
* Publishing update ([LK-973](http://youtrack.jc/issues/LK-973))

### Security
* License config test

-------------------------------------------------------------------------

## [1.1.1]() - _2020-04-23_

### Breaking Changes
* Move model and mail template from core to module ([LKM-10](http://youtrack.jc/issue/LKM-10))

-------------------------------------------------------------------------

## [1.1.0]() - _2020-04-16_
### Breaking Changes
* Rename namespaces lk to core

### Changes
* PSR-2/PSR-4 code style

-------------------------------------------------------------------------

## [1.0.1]() - _2020-02-26_

### Breaking Changes
* Add notification view to package, so this view will be used instead of earlier used core one

### Added
* Possibility to publish views and translations

### Fixed
* ServiceProvider which loads either api or admin service provider

-------------------------------------------------------------------------


## [1.0.0]() - _2020-02-06_
### Breaking Changes
* Admin Grids now using core package, which is incompatible with old version

-------------------------------------------------------------------------

## [0.3.0]()
### Added
* Feature: Add title to page. @im

### Changed
* Refactor: Moved non-php sources outside /src/ folder. @ap

-------------------------------------------------------------------------

## [0.2.0]()
### Added
* Feature: Code copyright message for release. @ap

-------------------------------------------------------------------------

## [0.1.0]()
### Added
* Module Alpha version
