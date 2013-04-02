Gravity Forms Polls Top Picks
==============================

Gravity Forms is an awesome Wordpress plugin. Using the polls extension allows for more interaction with users. I wanted to a way to grab (in order) the top (5,10,etc.) results from the poll without looking at all the poll results.

This is my first Git/Github project.

I want to eventually turn this into something Gravity Forms can use for their own, as it is a good way to poll in larger user groups.


To Install:
-----------
* Download / Pull gravity-forms-top-picks.php
* Use WP backend to install plugin

To Use:
-------
Shortcode `[gftop]`

Attributes:
-----------
* `total` - how many do you want to show?
* `formid` - which form do you want to use (mus be a poll)?

Example:
--------
`[gftop total="5" formid="2"]` - will pull the top 5 results from form 2
