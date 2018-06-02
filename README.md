Sourdust Feed Aggregator
========================

https://github.com/samwilson/sourdust-feed-aggregator

## Installation

1. Clone from GitHub: `git clone https://github.com/samwilson/sourdust-feed-aggregator.git feeds`
2. Go into that directory: `cd feeds`
2. Install dependencies: `composer install`
3. Copy the `.example` files to remove that suffix.
   The minimum required files are:
   * `cp feeds.txt.example feeds.txt`
   * `cp index.html.twig.example index.html.twig`
   * `cp atom.xml.twig.example atom.xml.twig`
4. Run `./run.php` (or add it to a cronjob)

This will create `index.html` and `atom.xml`.

## Custom templates

Anything with the `.twig` file extension will be rendered and output as the same
filename without the `.twig`, so to create another template (e.g. `feeds.opml`)
you can just create a new file (e.g. `feeds.opml.twig`).

## Backing up

Make sure you back up the following files:

* `feeds.txt`
* `*.twig`

## Kudos
* SimplePie: https://simplepie.org/
* Bootstrap CSS: https://getbootstrap.com/
* Twig templating: https://twig.sensiolabs.org/

## Licence (GPL3+)

Copyright © 2018 Sam Wilson.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
