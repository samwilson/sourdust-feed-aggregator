Sourdust Feed Aggregator
========================

https://github.com/samwilson/sourdust-feed-aggregator

## Installation

1. Clone from GitHub: `git clone https://github.com/samwilson/sourdust-feed-aggregator.git feeds`
2. Rename the files with `_example` in their names (to remove that string), and edit these copies to your satisfaction
3. Run `php run.php`

This will create: `index.html`, `feed.rss`, and `feeds.html`.

## Custom templates

Anything with the `.twig` file extension will be rendered and output as the same
filename without the `.twig`, so to create other templates (e.g. `feeds.opml`)
you can just create any file (e.g. `feeds.opml.twig`).

## Kudos
* SimplePie: http://simplepie.org/
* Marx CSS: https://github.com/mblode/marx
* Twig templating: http://twig.sensiolabs.org/

## Licence

Copyright (C) 2016 Sam Wilson

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
