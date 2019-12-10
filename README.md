Shopping List
=============

A responsive shopping list web app made for my very particular parents. Allows you to have
a list of favorite items that you can add to your shopping list every week, as well as
categories and customizable notes.

To install manually:
  - Create a SQL database on your server and run _setup/createtables.sql on it
  - Open up _setup/db-setup.php and follow the instructions
  - Copy src to webroot

To run with docker:
  - git clone this repo
  - run docker-compose up -d
  - the app should be running on port 6981

See it in action here: http://gooble.biz/list/ (temporarily unavailable)
